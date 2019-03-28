<?php

namespace app\controllers;

use app\models\Archivecall;
use app\models\ArchiveCallSearch;
use app\models\Operator;
use app\models\OperatorSearch;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\Search;

class OperatorMasterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGrid()
    {
        $archivecallSearch= new ArchiveCallSearch();
        $dataProvider=$archivecallSearch->Search(\Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        return $this->render('grid',['searchModel'=>$archivecallSearch,
                                          'dataProvider'=>$dataProvider
]);

    }

}
