<?php

namespace app\controllers;

use Yii;
use app\models\Currentoperators;
use app\models\CurrentoperatorsSearch;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class CurrentoperatorsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete','exit','data'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','exit','data'],
                        'roles' => ['admin','manager'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index','view','create','update','delete','lists'],
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new CurrentoperatorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=120;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDoexit($opid)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spCurrentOperators_SetLogOffDatetimeAndExit(:opid)")
            ->bindValue(':opid' , $opid );
        $command->query();



        $searchModel = new CurrentoperatorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=120;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionData()
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
        ///////////////////////////////Online CurrentOperators Information Box////////////////
        /// /////////////////////////////////////////////////////////////////////////

        //CurrentOperators
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentOperators_GetCountByCityCode(:cityId)")
            ->bindValue(':cityId', '');
        $CurrentOperatorsQuery = $command->queryAll();
        $CurrentOperators = $CurrentOperatorsQuery[0]['count'];

        //Waiting
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsCurrentCalls_GetStatesAndCountByCityCode_Waiting(:cityId)")
            ->bindValue(':cityId', $cityId);
        $WaitingQuery = $command->queryAll();
        if (count($WaitingQuery) == 0)
            $Waiting = 0;
        else
            $Waiting = $WaitingQuery[0]['count'];

        $updateParameter = [$CurrentOperators, $Waiting];
        echo Json::encode($updateParameter);
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
