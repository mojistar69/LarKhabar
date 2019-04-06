<?php

namespace app\controllers;


use Yii;
use yii\data\ArrayDataProvider;


class OperatorMasterReportController extends \yii\web\Controller
{
    public function actionIndex($operators_str)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call selectmaster(:operators,:startdate,:enddate)")
            ->bindValue(':operators' , $operators_str )
            ->bindValue(':startdate' , '2018-01-01 00:00:00' )
            ->bindValue(':enddate' , '2020-01-01 00:00:00' );
        $result = $command->queryAll();

        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        return $this->render('index',['dataProvider'=>$dataProvider
        ]);
    }



}
