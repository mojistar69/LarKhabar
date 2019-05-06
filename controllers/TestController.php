<?php

namespace app\controllers;

use Yii;
use yii\data\ArrayDataProvider;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $startDatetime =  '\''.'2016-01-01' . ' 00:00:00'.'\'';
        $endDatetime =  '\''.'2020-01-01' . ' 00:00:00'.'\'';

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select *,timediff(logoffdatetime,logindatetime) as term
,time(logoffdatetime) as logofftime,operators.name as opname, city.name as cname,archiveOperators.logindatetime as datetime,
time(logindatetime) logintime from archiveOperators
join operators on archiveOperators.opid = operators.opid
join city on archiveOperators.cityId = city.id
 WHERE  logindatetime >= $startDatetime  AND
  logindatetime <= $endDatetime and archiveOperators.opnumber in ('599,600,601') ;
  ");
        $result = $command->queryAll();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        $dataProvider->pagination->pageSize=10;
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

}
