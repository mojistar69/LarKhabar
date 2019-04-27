<?php

namespace app\controllers;

use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;

class OperatorDetailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGrid()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select operators.cityid,operators.opid,operators.name as name,operators.family as family,
operators.opnumber as opnumber
from archivecalls  
join operators on archivecalls.opid = operators.opid 
where archivecalls.startdatetime >= '2018-01-01 00:00:00'
and archivecalls.enddatetime <= '2020-01-01 00:00:00' 
group by opid; ");
        $result = $command->queryAll();
        //
        $archivecallSearch= new ArchiveCallSearch();
        $dataProvider=$archivecallSearch->Search(\Yii::$app->request->queryParams);
        //
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        $dataProvider->pagination->pageSize=10;
        return $this->render('grid',['searchModel'=>$archivecallSearch,
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionSelected()
    {
        $select_array = (array) Yii::$app->request->post('selection');
        $selection_str=$this->select($select_array);
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select *,operators.name as opname,callstates.name as state,
 city.name as cname from archivecalls
join operators on archivecalls.opid = operators.opid
join city on archivecalls.cityId = city.id
join callstates on callstates.Id = archivecalls.calllaststate
 WHERE  startdatetime >= '2018-01-01 00:00:00'  AND
  startdatetime <= '2020-01-01 00:00:00' and archivecalls.opnumber in ($selection_str) ;
  ");
        $result = $command->queryAll();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        return $this->render('operatorDetailReport',['dataProvider'=>$dataProvider
        ]);
    }

    public function select($select_array)
    {
        $selection_str='';
        foreach ($select_array as $s ){
            $selection_str=$selection_str.','.$s;
        }
        $selection_str=substr($selection_str,1,strlen($selection_str));
        return $selection_str;
    }
}
