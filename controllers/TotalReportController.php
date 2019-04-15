<?php

namespace app\controllers;

use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;

class TotalReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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
            $endDate = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2],'-');
        }

        $startDateTime1='2018-01-01 00:00:00';
        $endDateTime1='2020-01-01 00:00:00';
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*) as count FROM archiveCalls
where `startdatetime` >= '$startDateTime1' AND `startdatetime`<= '$endDateTime1'");
        $result = $command->queryAll();
        $countAll=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM archivecalls where
 `startdatetime` >= '$startDateTime1' AND `startdatetime`<= '$endDateTime1' AND calllaststate > 300 AND calllaststate < 400");
        $result = $command->queryAll();
        $countConnectedToOperator=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM archivecalls where 
 `startdatetime` >= '$startDateTime1' AND `startdatetime`<= '$endDateTime1'
 AND responses != ''");
        $result = $command->queryAll();
        $countResponed=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM archivecalls where 
 `startdatetime` >= '$startDateTime1' AND `startdatetime`<= '$endDateTime1'
 AND responses != '' AND responses Not in ( SELECT distinct phoneNumber FROM phonenumber)");
        $result= $command->queryAll();
        $tmp=$result[0]['count'];

        $countCmmercialResponed=(int)$countResponed-(int)$tmp;

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM archivecalls where 
 `startdatetime` >= '$startDateTime1' AND `startdatetime`<= '$endDateTime1'
 AND service = '-7'");
        $result = $command->queryAll();
        $countOralResponed=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select AVG(talktime)as average from archivecalls where 
 `startdatetime` >= '$startDateTime1' AND `startdatetime`<= '$endDateTime1'");
        $result = $command->queryAll();
        $averageTalkTime=$result[0]['average'];

        $Parameter = [$countAll, $countConnectedToOperator, $countResponed, $countCmmercialResponed,
            $countOralResponed, $averageTalkTime];
        var_dump($Parameter);
        return $this->render('totalReport',['Parameter' => $Parameter]);
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
