<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;

class OfflineTrafficController extends \yii\web\Controller
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
                        'roles' => ['admin','manager'],
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
    public function actionIndex(){
        $miladi_today=date("Y/m/d");
        $t = explode('/',$miladi_today);
        $today=$this->gregorian_to_jalali($t[0], $t[1], $t[2],'/');
        $tomarrow=$this->gregorian_to_jalali($t[0], $t[1], $t[2]+1,'/');
        $startDate_Shamsi = $today;
        $endDate_Shamsi = $tomarrow;
    
        return $this->render('index',
            ['startDatetime'=>$startDate_Shamsi,
                'endDatetime'=>$endDate_Shamsi
            ]);
    }
    public function actionRefreshData()
    {
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

        /////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////Offline Traffic Information Box////////////////
        /// /////////////////////////////////////////////////////////////////////////



        $chart1_2 = $this->chart1($startDatetime,$endDatetime,$cityId);

        $chart4 = $this->chart4($startDatetime,$endDatetime,$cityId);


        $updateParameter = [ $chart1_2, $chart4];
        echo Json::encode($updateParameter);
    }

    public function chart1($startDatetime,$endDatetime,$cityIds)
    {

        //allActiveOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveoperators_GetOperatorCount(:cityCodes,:startDateTime,:endDateTime)")
            ->bindValue(':cityCodes', "")
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $Active = $command->queryAll();
        $ActiveOperators = $Active[0]['ActiveOperators'];


        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsOparators_GetOperatorCount(:cityCodes)")
            ->bindValue(':cityCodes', "");
        $all = $command->queryAll();
        $allOperators = $all[0]['count'];

        //inactive
        $Inactive = $allOperators - $ActiveOperators;

        $chartsValues = [[(int)$allOperators, (int)$ActiveOperators, $Inactive]];
        return $chartsValues;
    }

    public function chart4($startDatetime,$endDatetime,$cityIds)
    {
        //RejectedCalls
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount201_byDate(:cityIds,:startDateTime,:endDateTime)")
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $rejectedCallsQuery = $command->queryAll();
        $rejectedCalls = $rejectedCallsQuery[0]['count'];
        //AnswerWithoutCall
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount202_byDate(:cityIds,:startDateTime,:endDateTime)")
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $answerWithoutCallQuery = $command->queryAll();
        $answerWithoutCall = $answerWithoutCallQuery[0]['count'];
        //DisconnectFromCommon
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount203_byDate(:cityIds,:startDateTime,:endDateTime)")
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $disconnectFromCommonQuery = $command->queryAll();
        $disconnectFromCommon = $disconnectFromCommonQuery[0]['count'];
        //ConnectivityProblems
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount204_byDate(:cityIds,:startDateTime,:endDateTime)")
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $connectivityProblemsQuery = $command->queryAll();
        $connectivityProblems = $connectivityProblemsQuery[0]['count'];
        //BusyLines
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount205(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $busyLinesQuery = $command->queryAll();
        $busyLines = $busyLinesQuery[0]['count'];
        //UnAccessChannels
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount206(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $unAccessChannelsQuery = $command->queryAll();
        $unAccessChannels = $unAccessChannelsQuery[0]['count'];
        //UnknownStatus
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount200(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $unknownStatusQuery = $command->queryAll();
        $unknownStatus = $unknownStatusQuery[0]['count'];
        //AnswerWithOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount301304219_byDate(:cityIds,:startDateTime,:endDateTime)")
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $answerWithOperatorsQuery = $command->queryAll();
        $answerWithOperators = $answerWithOperatorsQuery[0]['count'];
        //DisconnectCommonInWaiting
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount401402_byDate(:cityIds,:startDateTime,:endDateTime)")
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime);
        $disconnectCommonInWaitingQuery = $command->queryAll();
        $disconnectCommonInWaiting = $disconnectCommonInWaitingQuery[0]['count'];

        $listParameters = [
            ['name' => 'قطع مشترک در حالت انتظار', 'y' => (int)$disconnectCommonInWaiting],
            ['name' => 'تماس رد شده', 'y' => (int)$rejectedCalls],
            ['name' => 'پاسخ بی تماس', 'y' => (int)$answerWithoutCall],
            ['name' => 'قطع تماس از طرف مشترک', 'y' => (int)$disconnectFromCommon],
            ['name' => 'مشکلات ارتباطی', 'y' => (int)$connectivityProblems],

            ['name' => 'مشغولی خطوط', 'y' => (int)$busyLines],

            ['name' => 'عدم در دسترس بودن کانال', 'y' => (int)$unAccessChannels],

            ['name' => 'وضعیت نامعلوم', 'y' => (int)$unknownStatus],
            ['name' => 'پاسخ گویی توسط اپراتور', 'y' => (int)$answerWithOperators]];

        //no calls so get message
        if((int)$rejectedCalls==0 && (int)$answerWithoutCall==0 && (int)$disconnectFromCommon==0
            && (int)$connectivityProblems==0 &&  (int)$busyLines==0 && (int)$unAccessChannels==0
            && (int)$unknownStatus==0 && (int)$answerWithOperators==0
         && (int)$disconnectCommonInWaiting==0)
        {$listParameters =[['name' => 'در این بازه تاریخی هیج تماسی ثبت نشده است. ', 'y' => 0.00001]];}

        return $listParameters;

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
    
      function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
 $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
 if($gy > 1600){
  $jy=979;
  $gy-=1600;
 }else{
  $jy=0;
  $gy-=621;
 }
 $gy2=($gm > 2)?($gy+1):$gy;
 $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
 $jy+=33*((int)($days/12053));
 $days%=12053;
 $jy+=4*((int)($days/1461));
 $days%=1461;
 $jy+=(int)(($days-1)/365);
 if($days > 365)$days=($days-1)%365;
 if($days < 186){
  $jm=1+(int)($days/31);
  $jd=1+($days%31);
 }else{
  $jm=7+(int)(($days-186)/30);
  $jd=1+(($days-186)%30);
 }
 if($jm<10) $jm='0'.$jm;
  if($jd<10) $jd='0'.$jd;
 return($mod==='')?array($jy,$jm,$jd):$jy .$mod .$jm .$mod .$jd;
}

}
