<?php

namespace app\controllers;

use app\models\Archivecall;
use app\models\ArchiveCallSearch;
use app\models\Operator;
use app\models\OperatorSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\Search;

class OperatorMasterController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionSelected()
    {
        $select = (array) Yii::$app->request->post('selection');
        $selection_str='';
        foreach ($select as $s ){
        $selection_str=$selection_str.','.$s;
    }
        $selection_str=substr($selection_str,1,strlen($selection_str));

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT opid FROM `archivecalls` WHERE calluid IN ($selection_str)");
        $operators = $command->queryAll();

        $operators_str='';
        foreach ($operators as $o ){
            $operators_str=$operators_str.','.$o['opid'];
        }
        $operators_str=substr($operators_str,1,strlen($operators_str));
//        var_dump($operators_str);
        return $this->redirect(['operator-master-report/index', 'operators_str' => $operators_str]);

    }

    public function actionGrid()
    {
        $startDate='2018-12-15';
        if (Yii::$app->request->post('startDate')!='') {
        $tmp1 = explode('/', Yii::$app->request->post('startDate'));
        $startDate = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2],'-');
    }
        $endDate='2018-12-15';
        if (Yii::$app->request->post('endDate')!='') {
            $tmp2 = explode('/', Yii::$app->request->post('endDate'));
            $endDate = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2],'-');
        }

        $archivecallSearch= new ArchiveCallSearch();
        $dataProvider=$archivecallSearch->Search(\Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        return $this->render('grid',['searchModel'=>$archivecallSearch,
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

}
