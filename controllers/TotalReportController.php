<?php

namespace app\controllers;

use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;

class TotalReportController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','grid','selected'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','grid'],
                        'roles' => ['admin','manager'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index','grid'],
                        'roles' => ['?'],
                    ],
                ],
            ],

        ];
    }
    public function actionIndex()
    {
        $Parameter = [0, 0, 0, 0,
            0, 0];
         $miladi_today=date("Y/m/d");
        $t = explode('/',$miladi_today);
        $today=$this->gregorian_to_jalali($t[0], $t[1], $t[2],'/');
        $tomarrow=$this->gregorian_to_jalali($t[0], $t[1], $t[2]+1,'/');
        $startDate_Shamsi = $today;
        $endDate_Shamsi = $tomarrow;
        return $this->render('index',
            ['startDatetime'=>$startDate_Shamsi,
                'endDatetime'=>$endDate_Shamsi,
                'Parameter'=>$Parameter
            ]);
    }
    public function actionGrid()
    {
        $startDate_Shamsi='';
        $endDate_Shamsi ='';

        if (isset($_GET["startDate"])) {
            $startDate_Shamsi = $_GET["startDate"];
        }
        if (isset($_GET["endDate"])) {
            $endDate_Shamsi = $_GET["endDate"];
        }

        $tmp1 = explode('/',$startDate_Shamsi );
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');

        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';


        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*) as count FROM federated_archivecalls
where `startdatetime` >= $startDatetime AND `startdatetime`<= $endDatetime");
        $result = $command->queryAll();
        $countAll=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM federated_archivecalls where
 `startdatetime` >= $startDatetime AND `startdatetime`<= $endDatetime AND calllaststate > 300 AND calllaststate < 400");
        $result = $command->queryAll();
        $countConnectedToOperator=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM federated_archivecalls where 
 `startdatetime` >= $startDatetime AND `startdatetime`<= $endDatetime
 AND responses != ''");
        $result = $command->queryAll();
        $countResponed=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM federated_archivecalls where 
 `startdatetime` >= $startDatetime AND `startdatetime`<= $endDatetime
 AND responses != '' AND responses Not in ( SELECT distinct phoneNumber FROM phonenumber)");
        $result= $command->queryAll();
        $tmp=$result[0]['count'];

        $countCmmercialResponed=(int)$countResponed-(int)$tmp;

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT count(*)as count FROM federated_archivecalls where 
 `startdatetime` >= $startDatetime AND `startdatetime`<= $endDatetime
 AND service = '-7'");
        $result = $command->queryAll();
        $countOralResponed=$result[0]['count'];

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select AVG(talktime)as average from federated_archivecalls where 
 `startdatetime` >= $startDatetime AND `startdatetime`<= $endDatetime");
        $result = $command->queryAll();
        $averageTalkTime=$result[0]['average'];
        if($averageTalkTime==null){
            $averageTalkTime=0;
        }

        $Parameter = [$countAll, $countConnectedToOperator, $countResponed, $countCmmercialResponed,
            $countOralResponed, $averageTalkTime];
;
        return $this->render('index',['Parameter' => $Parameter,
            'startDatetime' => $startDate_Shamsi,
            'endDatetime' => $endDate_Shamsi,
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
        
                   function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
 $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
 if($gy > 1600){
  $jy=979;
  $gy-=1600;
 }else{
  $jy=0;
  $gy-=621;
 }
 $gy2=($gm > 2)?($gy+1):$gy;
 $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
 $jy+=33*((int)($days/12053));
 $days%=12053;
 $jy+=4*((int)($days/1461));
 $days%=1461;
 $jy+=(int)(($days-1)/365);
 if($days > 365)$days=($days-1)%365;
 if($days < 186){
  $jm=1+(int)($days/31);
  $jd=1+($days%31);
 }else{
  $jm=7+(int)(($days-186)/30);
  $jd=1+(($days-186)%30);
 }
 if($jm<10) $jm='0'.$jm;
  if($jd<10) $jd='0'.$jd;
 return($mod==='')?array($jy,$jm,$jd):$jy .$mod .$jm .$mod .$jd;
}
}
