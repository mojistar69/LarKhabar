<?php

namespace app\controllers;

use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;

class OperatorDetailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index',
            ['startDatetime'=>'1397/01/01',
                'endDatetime'=>'1398/01/01'
            ]);
    }

    public function actionGrid()
    {
        $startDate_Miladi='2017-01-01';
        $endDate_Miladi ='2018-01-02';
        $startDate_Shamsi='';
        $endDate_Shamsi ='';
        if (Yii::$app->request->post('startDate') != '') {
            $startDate_Shamsi=Yii::$app->request->post('startDate');
            $tmp1 = explode('/',$startDate_Shamsi );
            $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        }
        if (Yii::$app->request->post('endDate') != '') {
            $endDate_Shamsi=Yii::$app->request->post('endDate');
            $tmp2 = explode('/', $endDate_Shamsi);
            $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        }
        if (Yii::$app->request->get('startDate') != '') {
            $startDate_Shamsi=Yii::$app->request->get('startDate');
            $tmp1 = explode('/',$startDate_Shamsi );
            $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        }
        if (Yii::$app->request->get('endDate') != '') {
            $endDate_Shamsi=Yii::$app->request->get('endDate');
            $tmp2 = explode('/', $endDate_Shamsi);
            $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        }
        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';

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

        return $this->render('index',[
            'dataProvider'=>$dataProvider,
            'startDatetime' => $startDate_Shamsi,
            'endDatetime' => $endDate_Shamsi,
        ]);
    }

    public function actionSelected()
    {
        $select_array = (array) Yii::$app->request->post('selection');
        $startDatetime=Yii::$app->request->post('sdate');
        $endDatetime=Yii::$app->request->post('edate');
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
//        return $this->render('operatorDetailReport',['dataProvider'=>$dataProvider,
//            'startdate' => $startDatetime,
//            'enddate' => $endDatetime,
//        ]);
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

    function jalali_to_gregorian($jy, $jm, $jd, $mod = '')
    {
        if ($jy > 979) {
            $gy = 1600;
            $jy -= 979;
        } else {
            $gy = 621;
        }
        $days = (365 * $jy) + (((int)($jy / 33)) * 8) + ((int)((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
        $gy += 400 * ((int)($days / 146097));
        $days %= 146097;
        if ($days > 36524) {
            $gy += 100 * ((int)(--$days / 36524));
            $days %= 36524;
            if ($days >= 365) $days++;
        }
        $gy += 4 * ((int)($days / 1461));
        $days %= 1461;
        if ($days > 365) {
            $gy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }
        $gd = $days + 1;
        foreach (array(0, 31, (($gy % 4 == 0 and $gy % 100 != 0) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
            if ($gd <= $v) break;
            $gd -= $v;
        }
        return ($mod == '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
    }
}
