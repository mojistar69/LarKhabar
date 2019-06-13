<?php

namespace app\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;

class RequestedNumberController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','grid'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','grid'],
                        'roles' => ['admin','manager'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index','grid'],
                        'roles' => ['?'],
                    ],
                ],
            ],

        ];
    }
    public function actionIndex()
    {
        return $this->render('index',
            ['startDatetime'=>'1398/03/10',
                'endDatetime'=>'1398/03/12'
            ]);
    }
    public function actionGrid()
    {
        $startDate_Shamsi='';
        $endDate_Shamsi ='';

        if (isset($_GET["startDate"])) {
            $startDate_Shamsi = $_GET["startDate"];
        }
        if (isset($_GET["endDate"])) {
            $endDate_Shamsi = $_GET["endDate"];
        }

        $tmp1 = explode('/',$startDate_Shamsi );
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');

        $startDatetime = $startDate_Miladi . ' 00:00:00';
        $endDatetime = $endDate_Miladi . ' 00:00:00';

        //if select one zone
        if(isset($_GET['zoneId']) and $_GET['zoneId'] !='')
        $zoneId = $_GET['zoneId'];
          else  //else all of zone was selected
              $zoneId=-1;

        //if select one phonenumber
        if(isset($_GET['phonenumber']) and $_GET['phonenumber'] !='')
            $phonenumber = $_GET['phonenumber'];
        else  //else all of phonenumber was selected
            $phonenumber=null;

        $dataProvider=$this->doQuery($startDatetime,$endDatetime,$zoneId,$phonenumber);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'startDatetime' => $startDate_Shamsi,
            'endDatetime' => $endDate_Shamsi,
        ]);
    }
    public function doQuery($startDatetime,$endDatetime,$zoneId,$phonenumber)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spGetMostRequestedTelNumbers(:startdt,:enddt,:zone,
        :count,:phoneNumber)")
            ->bindValue(':startdt', $startDatetime)
            ->bindValue(':enddt', $endDatetime)
            ->bindValue(':zone', $zoneId)
            ->bindValue(':count', 10)
            ->bindValue(':phoneNumber', $phonenumber);
        $result = $command->queryAll();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        $dataProvider->pagination->pageSize=10;
        return $dataProvider;

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
