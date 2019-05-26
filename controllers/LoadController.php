<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;

class LoadController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','refreshdata'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','refreshdata'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index','refreshdata'],
                        'roles' => ['?'],
                    ],
                ],
            ],

        ];
    }
    public function actionIndex()
    {
        return $this->render('index',
            ['startDatetime'=>'1398/03/01',
                'endDatetime'=>'1398/03/02'
            ]);
    }

    public function actionRefreshData()
    {

        //////////////////prepare zone and city to do query
        if(!isset($_GET['zoneId']))
            return;
        $zoneId = $_GET['zoneId'];
        //array of all cities in the selected zoneId
        $listCityId = '1';
        //was selected a zone
        if ($zoneId != '0') {
            //query of all cities of  selected zone
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand("call spsCities_Id_GetByZoneId(:zoneId)")
                ->bindValue(':zoneId', $zoneId);
            $citiesId = $command->queryAll();
            //list of all cities of selected zone and concat CitiesIds
            $listCityId = $this->concatCityIds($citiesId);
        } else  //was not select a certain zone so select all cities by default
            $listCityId = $this->getAllCities();
        //was not select a city
        if ($_GET['cityId'] === '0') {
            $cityId = $listCityId;
        } else {
            //selected cityId
            $cityId = $_GET['cityId'];
        }

        //////////////////////////////////////////////////////////////////////////

        $startDate='2018-01-01';
        $endDate ='2018-01-02';
        if ($_GET['startdate'] != '') {
            $tmp1 = explode('/', $_GET['startdate']);
            $startDate = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        }
        if ($_GET['startdate'] != '') {
            $tmp2 = explode('/', $_GET['enddate']);
            $endDate = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        }

        $startDatetime =  $startDate . ' 00:00:00';
        $endDatetime =  $endDate . ' 00:00:00';

//        ***********************************************************
        $chart1 = $this->chart1($startDatetime,$endDatetime,$cityId);
        $chart2 = $this->chart2($startDatetime,$endDatetime,$cityId);
        $chart3 = $this->chart3($startDatetime,$endDatetime,$cityId);
        $updateParameter = [$chart1,$chart2,$chart3];
        echo Json::encode($updateParameter);
    }

    public function chart1($startDatetime,$endDatetime,$cityId)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call LoadOfCalls(:startDateTime,:endDateTime,:cityId)")
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime)
            ->bindValue(':cityId', $cityId);
        $loadQuery = $command->queryAll();
        $array = array_fill(0, 24,0);
        if (count($loadQuery)>0) {
            for ($i = 0; $i < count($loadQuery); $i++) {
                $indx = (int)$loadQuery[$i]['hour'];
                $array[$indx] = (int)$loadQuery[$i]['hcount'];
            }
        }
        return $array;
    }
    public function chart2($startDatetime,$endDatetime,$cityId)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call LoadOfCalls(:startDateTime,:endDateTime,:cityId)")
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime)
            ->bindValue(':cityId', $cityId);
        $loadQuery = $command->queryAll();
        $array = array_fill(0, 24,0);
        if (count($loadQuery)>0) {
            for ($i = 0; $i < count($loadQuery); $i++) {
                $indx = (int)$loadQuery[$i]['hour'];
                $array[$indx] = (int)$loadQuery[$i]['opcount'];
            }
        }
        return $array;
    }
    public function chart3($startDatetime,$endDatetime,$cityId)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call LoadOfCalls_Waitting(:startDateTime,:endDateTime,:cityId)")
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime)
            ->bindValue(':cityId', $cityId);
        $loadQuery = $command->queryAll();
        $array = array_fill(0, 24,0);
        if (count($loadQuery)>0) {
            for ($i = 0; $i < count($loadQuery); $i++) {
                $indx = (int)$loadQuery[$i]['hour'];
                $array[$indx] = (int)$loadQuery[$i]['wcount'];
            }
        }
        return $array;
    }

    public function getAllCities()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCities_CityCodes");
        $citiesId = $command->queryAll();
        $listCityId = $this->concatCityIds($citiesId);
        return $listCityId;
    }

    public function concatCityIds($cityRows)
    {
        $stringIds = "";
        foreach ($cityRows as $city) {
            $stringIds = $stringIds . $city['id'] . ',';
        }
        $stringIds = substr($stringIds, 0, strlen($stringIds) - 1);
        return $stringIds;
    }
    function jalali_to_gregorian($jy, $jm, $jd, $mod = '')
    {
        if ($jy > 979) {
            $gy = 1600;
            $jy -= 979;
        } else {
            $gy = 621;
        }
        $days = (365 * $jy) + (((int)($jy / 33)) * 8) + ((int)((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
        $gy += 400 * ((int)($days / 146097));
        $days %= 146097;
        if ($days > 36524) {
            $gy += 100 * ((int)(--$days / 36524));
            $days %= 36524;
            if ($days >= 365) $days++;
        }
        $gy += 4 * ((int)($days / 1461));
        $days %= 1461;
        if ($days > 365) {
            $gy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }
        $gd = $days + 1;
        foreach (array(0, 31, (($gy % 4 == 0 and $gy % 100 != 0) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
            if ($gd <= $v) break;
            $gd -= $v;
        }
        return ($mod == '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
    }

}
