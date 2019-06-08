<?php

namespace app\controllers;
use yii\helpers\Json;
use Yii;

class DashboardController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRefreshData()
    {
        //call states of call
        $CallStates = '301, 304, 219,203';

        $zoneId = $_GET['zoneId'];
        //array of all cities in the selected zoneId
        $listCityId = '1';

        //was selected a zone
        if ($zoneId != '0') {
            //query of all cities of  selected zone
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand("call spsCities_Id_GetByZoneId(:zoneId)")
                ->bindValue(':zoneId' , $zoneId );
            $citiesId = $command->queryAll();
            //list of all cities of selected zone and concat CitiesIds
            $listCityId = $this->concatCityIds($citiesId);

             }
        else  //was not select a certain zone so select all cities by default
            $listCityId=$this->getAllCities();

        //was not select a city
        if ($_GET['cityId'] === '0') {
            $cityId = $listCityId;
        } else {
            //selected cityId
            $cityId = $_GET['cityId'];

        }
        ///////////////////////////////////////////////////////////////////////
        /////////////////First box of information Table ==>Operators //////////
        /// ///////////////////////////////////////////////////////////////////

        //CountOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsOperators_SelectCountByCityCodes(:cityId)")
            ->bindValue(':cityId' , $cityId );
        $CountOperatorQuery = $command->queryAll();
        $CountOperator=$CountOperatorQuery[0]['count'];


        //CountActiveOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentOperators_GetCountByCityCode(:cityId)")
            ->bindValue(':cityId' , $cityId );
        $CountActiveOperatorQuery = $command->queryAll();
        $CountActiveOperator = $CountOperator=$CountOperatorQuery[0]['count'];

        //UnLocalOperators
        if ($zoneId === '0')
            $UnLocalOperators = 0;
        else {
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand("call spsUnLocal_GetCountByCityCode(:listCityId)")
                ->bindValue(':listCityId' , $listCityId );
            $UnLocalOperatorsQuery = $command->queryAll();
            $UnLocalOperators = $CountOperator=$CountOperatorQuery[0]['count'];
        }

        //TotalTime
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetTotalStatistics2(:CallStates,:listCityId)")
            ->bindValue(':CallStates' , $CallStates )
            ->bindValue(':listCityId' , $listCityId );
        $TotalStatistics2Query = $command->queryAll();
        $sum = $TotalStatistics2Query[0]['sumCallsOfSelectedState'];
        $TotalTime = $this->toTimeFormat($sum);


        //AvgTime
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetTotalStatistics(:CallStates,:listCityId)")
            ->bindValue(':CallStates' , $CallStates )
            ->bindValue(':listCityId' , $listCityId );
        $TotalStatisticsQuery = $command->queryAll();
        $count = $TotalStatisticsQuery[0]['countCallsOfSelectedState'];
        $AvgTime ='0:0:0';
        if ($count!=0)
        $AvgTime =  $this->toTimeFormat(($sum / $count));
        /////////////////////////////////////////////////////////////////////
        /////////////////Second box of information Table ==>Calls //////////
        ////////////////////////////////////////////////////////////////////

//        //EnteredCall
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetTotalStatistics1(:CallStates,:cityId)")
            ->bindValue(':CallStates' , $CallStates )
            ->bindValue(':cityId' , $cityId );
        $TotalStatistics1Query = $command->queryAll();
        $allStateCalls = $TotalStatistics1Query[0]['countCallsOfAllState'];


        //DisconnectCommonInWaiting
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount401402(:cityId)")
            ->bindValue(':cityId' , $cityId );
        $DisconnectCommonInWaitingQuery = $command->queryAll();
        $DisconnectCommonInWaiting=$DisconnectCommonInWaitingQuery[0]['count'];


        //answerWithOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount301304219(:cityId)")
            ->bindValue(':cityId' , $cityId );
        $answerWithOperators_Query = $command->queryAll();
        $answerWithOperators=$answerWithOperators_Query[0]['count'];

        //disconnectFromCommon
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsArchiveCallsNew_GetCount203(:cityId)")
            ->bindValue(':cityId' , $cityId );
        $disconnectFromCommonQuery = $command->queryAll();
        $disconnectFromCommon=$disconnectFromCommonQuery[0]['count'];


        //Disturber
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsDisturber_GetDisturberToday(:cityId)")
            ->bindValue(':cityId' , $cityId );
        $DisturberQuery = $command->queryAll();
        $Disturber=$disconnectFromCommonQuery[0]['count'];


        $data=[$CountOperator,$CountActiveOperator,$UnLocalOperators,$TotalTime,$AvgTime,$allStateCalls,
            $DisconnectCommonInWaiting,$answerWithOperators,$disconnectFromCommon,$Disturber];

        echo Json::encode($data);

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
    public function getAllCities(){
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCities_CityCodes");
        $citiesId = $command->queryAll();
        $listCityId = $this->concatCityIds($citiesId);
        return $listCityId;
    }
    public function toTimeFormat($sum)
    {
        $h=(int)($sum/3600);
        $m=(int)(($sum%3600)/60);
        $s=(int)($sum%60);
        return ''.$h.':'.$m.':'.$s;
    }

    public function actionDo()
    {
        return'do';
    }
}
