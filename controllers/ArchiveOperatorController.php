<?php

namespace app\controllers;

use Yii;
use yii\data\ArrayDataProvider;

class ArchiveOperatorController extends \yii\web\Controller
{
    public function actionIndex()
    {
    return $this->render('index');
    }

    public function actionGrid()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select id,operators.cityid,operators.opid,operators.name as name,operators.family as family,
operators.opnumber as opnumber,
SUM(archiveOperators.rcvcall) as rcvcall
,SUM(archiveOperators.anscall) as anscall
,count(*) as logcount
from archiveOperators  
join operators on archiveOperators.opid = operators.opid 
where archiveOperators.logindatetime >= '2018-01-01 00:00:00'
and archiveOperators.logindatetime <= '2020-01-01 00:00:00' 
group by opid; ");
        $result = $command->queryAll();


        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        $dataProvider->pagination->pageSize=10;
        return $this->render('grid',[
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionSelected()
    {
        $select = (array) Yii::$app->request->post('selection');
        $selection_str='';
        foreach ($select as $s ){
            $selection_str=$selection_str.','.$s;
        }
        $selection_str=substr($selection_str,1,strlen($selection_str));
        var_dump($selection_str);

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select *,timediff(logoffdatetime,logindatetime) as term
,time(logoffdatetime) as logofftime,operators.name as opname, city.name as cname,
time(logindatetime) logintime from archiveOperators
join operators on archiveOperators.opid = operators.opid
join city on archiveOperators.cityId = city.id
 WHERE  logindatetime >= '2018-01-01 00:00:00'  AND
  logindatetime <= '2020-01-01 00:00:00' and archiveOperators.opnumber in ($selection_str) ;
  ");
        $result = $command->queryAll();

        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        return $this->render('archiveOperatorReport',['dataProvider'=>$dataProvider
        ]);


    }

}
