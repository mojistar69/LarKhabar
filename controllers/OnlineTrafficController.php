<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;

class OnlineTrafficController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
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

    public function actionIndex()
    {
       return $this->render('index');
    }
    public function actionRefreshData()
    {

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


        /////////////////////////////////////////////////////////////////////////////
        ///////////////////////////////Online Traffic Information Box////////////////
        /// /////////////////////////////////////////////////////////////////////////
        //Channel
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsInfo_SelectdbInfo()");
        $Channel_Query = $command->queryAll();
        $Channel = $Channel_Query[0]['gatewayProNo'];


      //EnterCall
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_EnterCall(:cityId)")
            ->bindValue(':cityId', $cityId);
        $EnterCallQuery = $command->queryAll();
        $EnterCall = $EnterCallQuery[0]['count'];

      //Waiting
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Waiting(:cityId)")
            ->bindValue(':cityId', $cityId);
        $WaitingQuery = $command->queryAll();
        if (count($WaitingQuery) == 0)
            $Waiting = 0;
        else
            $Waiting = $WaitingQuery[0]['count'];



       //Talking
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Talking(:cityId)")
            ->bindValue(':cityId', $cityId);
        $TalkingQuery = $command->queryAll();
        if (count($TalkingQuery) == 0)
            $Talking = 0;
        else
            $Talking = $TalkingQuery[0]['count'];


       //Listening
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Listining(:cityId)")
            ->bindValue(':cityId', $cityId);
        $ListeningQuery = $command->queryAll();
        if (count($ListeningQuery) == 0)
            $Listening = 0;
        else
            $Listening = $ListeningQuery[0]['count'];

        $chart1_2 = $this->chart1($cityId);
        $chart3 = $this->chart3($cityId);
        $chart4 = $this->chart4($cityId);

        $updateParameter = [$Channel, $EnterCall, $Waiting, $Talking, $Listening, $chart1_2, $chart3, $chart4];
        echo Json::encode($updateParameter);
    }
    public function chart1($cityIds)
    {
        //allTodayOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsOperators_SelectCountByCityCodes(:cityIds)")
            ->bindValue(':cityIds', $cityIds);

        $allTodayOperatorsQuery = $command->queryAll();
        $all = (int)$allTodayOperatorsQuery[0]['count'];


        //todayActive
        $stoday=date("Y/m/d").' 00:00:00';
        $stomorrow=date("Y/m/d").' 23:59:59';
        $command =$connection->createCommand('call spsArchiveoperators_GetCountTodayOperator(:cityIds,:stoday,:stomorrow)')
            ->bindValue(':cityIds', $cityIds)
            ->bindValue(':stoday', $stoday)
            ->bindValue(':stomorrow',$stomorrow);
        $todayActiveQuery = $command->queryAll();
        $todayActive = (int)$todayActiveQuery[0]['ActiveOperators'];
        //inactive
        $todayInactive = $all - $todayActive;
//        ///////////////////////////
//        //////currentOperators
//        ///////////////////////////
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentOperators_GetCountByCityCode(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $currentActiveQuery = $command->queryAll();
        $currentActive = (int)$currentActiveQuery[0]['count'];

        //current Inactive
        $currentInactive = $all - $currentActive;
        $chartsValues = [[$all, $currentActive, $currentInactive],  //Current
            [$all, $todayActive, $todayInactive]];  //Today
        return $chartsValues;
    }
    public function chart3($cityIds)
    {
        //NewCall
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Waiting_or_NewCall(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $NewCallQuery = $command->queryAll();
        if (count($NewCallQuery) == 0)
            $NewCall = 0;
        else
            $NewCall = (int)$NewCallQuery[0]['count'];


        //Waiting
//        $connection = Yii::$app->getDb();
//        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Waiting(:cityIds)")
//            ->bindValue(':cityIds', $cityIds);
//        $WaitingQuery = $command->queryAll();
//        if (count($WaitingQuery) == 0)
//            $Waiting = 0;
//        else
//            $Waiting = (int)$WaitingQuery[0]['count'];
        //Talking
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Talking(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $TalkingQuery = $command->queryAll();
        if (count($TalkingQuery) == 0)
            $Talking = 0;
        else
            $Talking = (int)$TalkingQuery[0]['count'];

        //Listening
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Listining(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $ListeningQuery = $command->queryAll();
        if (count($ListeningQuery) == 0)
            $Listening = 0;
        else
            $Listening = (int)$ListeningQuery[0]['count'];
        $chartValues = [$NewCall,$Talking, $Listening];
        return $chartValues;
    }
    public function chart4($cityIds)
    {
        //RejectedCalls
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount201(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $rejectedCallsQuery = $command->queryAll();
        $rejectedCalls = $rejectedCallsQuery[0]['count'];

        //AnswerWithoutCall
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount202(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $answerWithoutCallQuery = $command->queryAll();
        $answerWithoutCall = $answerWithoutCallQuery[0]['count'];
        //DisconnectFromCommon
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount203(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $disconnectFromCommonQuery = $command->queryAll();
        $disconnectFromCommon = $disconnectFromCommonQuery[0]['count'];

        //ConnectivityProblems
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount204(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
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
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount301304219(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $answerWithOperatorsQuery = $command->queryAll();
        $answerWithOperators = $answerWithOperatorsQuery[0]['count'];
        //DisconnectCommonInWaiting
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount401402(:cityIds)")
            ->bindValue(':cityIds', $cityIds);
        $disconnectCommonInWaitingQuery = $command->queryAll();
        $disconnectCommonInWaiting = $disconnectCommonInWaitingQuery[0]['count'];
        $listParameters = [['name' => 'تماس رد شده', 'y' => (int)$rejectedCalls],
            ['name' => 'پاسخ بی تماس', 'y' => (int)$answerWithoutCall],
            ['name' => 'قطع تماس از طرف مشترک', 'y' => (int)$disconnectFromCommon],
            ['name' => 'مشکلات ارتباطی', 'y' => (int)$connectivityProblems],
            ['name' => 'مشغولی خطوط', 'y' => (int)$busyLines],
            ['name' => 'عدم در دسترس بودن کانال', 'y' => (int)$unAccessChannels],
            ['name' => 'وضعیت نامعلوم', 'y' => (int)$unknownStatus],
            ['name' => 'قطع مشترک در حالت انتظار', 'y' => (int)$disconnectCommonInWaiting],
            ['name' => 'پاسخ گویی توسط اپراتور', 'y' => (int)$answerWithOperators]];
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
}
