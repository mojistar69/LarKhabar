<?php

namespace app\controllers;

use app\models\Archivecall;
use app\models\ArchiveCallSearch;
use app\models\Operator;
use app\models\OperatorSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\models\timeline\Search;

class OperatorMasterController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionSelected()
    {
        $startDatetime='2018-01-01 00:00:00';
        $endDatetime='2020-01-01 00:00:00';
        $select_array = (array) Yii::$app->request->post('selection');
        $operators=$this->select($select_array);
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call selectmaster(:operators,:startdate,:enddate)")
            ->bindValue(':operators' , '1,1117,1116' )
            ->bindValue(':operators' , $operators )
            ->bindValue(':startdate' , '2018-01-01 00:00:00' )
            ->bindValue(':enddate' , '2020-01-01 00:00:00' );
        $result = $command->queryAll();

        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        return $this->render('operatorMasterReport',['dataProvider'=>$dataProvider
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

    public function actionGrid()
    {
        $startDate='2018-12-15';
        if (Yii::$app->request->post('startDate')!='') {
        $tmp1 = explode('/', Yii::$app->request->post('startDate'));
        $startDate = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2],'-');
    }
        $endDate='2020-12-15';
        if (Yii::$app->request->post('endDate')!='') {
            $tmp2 = explode('/', Yii::$app->request->post('endDate'));
            $endDate = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2],'-');
        }
        $startDatetime='\''.$startDate.' 00:00:00\'';
        $endDatetime='\''.$endDate.' 00:00:00\'';
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select operators.cityid,operators.opid,operators.name as name,operators.family as family,
operators.opnumber as opnumber,archivecalls.calluid as calluid,
archivecalls.startdatetime as startdatetime
from archivecalls  
join operators on archivecalls.opid = operators.opid 
where archivecalls.startdatetime >= $startDatetime
and archivecalls.enddatetime <= $endDatetime
group by opid; ");
        $result = $command->queryAll();

        $archiveCallSearch= new ArchiveCallSearch();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        $dataProvider->pagination->pageSize=10;
        return $this->render('grid',['searchModel'=>$archiveCallSearch,
            'dataProvider'=>$dataProvider
        ]);

    }
    function jalali_to_gregorian($jy,$jm,$jd,$mod=''){
        if($jy>979){
            $gy=1600;
            $jy-=979;
        }else{
            $gy=621;
        }
        $days=(365*$jy) +(((int)($jy/33))*8) +((int)((($jy%33)+3)/4)) +78 +$jd +(($jm<7)?($jm-1)*31:(($jm-7)*30)+186);
        $gy+=400*((int)($days/146097));
        $days%=146097;
        if($days > 36524){
            $gy+=100*((int)(--$days/36524));
            $days%=36524;
            if($days >= 365)$days++;
        }
        $gy+=4*((int)($days/1461));
        $days%=1461;
        if($days > 365){
            $gy+=(int)(($days-1)/365);
            $days=($days-1)%365;
        }
        $gd=$days+1;
        foreach(array(0,31,(($gy%4==0 and $gy%100!=0) or ($gy%400==0))?29:28 ,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
            if($gd<=$v)break;
            $gd-=$v;
        }
        return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;}

    public function actionSearch()
    {
        $searchModel = new ArchiveCallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('grid', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
