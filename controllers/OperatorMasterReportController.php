<?php

namespace app\controllers;


use Yii;
use yii\data\ArrayDataProvider;


class OperatorMasterReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call selectmaster(:operators,:startdate,:enddate)")
            ->bindValue(':operators' , '1,1117,1116' )
            ->bindValue(':startdate' , '2018-01-01 00:00:00' )
            ->bindValue(':enddate' , '2020-01-01 00:00:00' );
        $result = $command->queryAll();

        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        return $this->render('index',['dataProvider'=>$dataProvider
        ]);
    }

}
