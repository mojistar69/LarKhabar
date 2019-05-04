<?php

namespace app\controllers;

use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;

class OperatorAverageController extends \yii\web\Controller
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
        $startDate_Shamsi='';
        $endDate_Shamsi ='';
        if (Yii::$app->request->post('startDate') != '') {
            $startDate_Shamsi=Yii::$app->request->post('startDate');
        }
        if (Yii::$app->request->post('endDate') != '') {
            $endDate_Shamsi=Yii::$app->request->post('endDate');
        }
        if (Yii::$app->request->get('startDate') != '') {
            $startDate_Shamsi=Yii::$app->request->get('startDate');
        }
        if (Yii::$app->request->get('endDate') != '') {
            $endDate_Shamsi=Yii::$app->request->get('endDate');
        }

        $tmp1 = explode('/',$startDate_Shamsi );
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');

        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select operators.cityid,operators.opid,operators.name as name,operators.family as family,
operators.opnumber as opnumber
from archivecalls  
join operators on archivecalls.opid = operators.opid 
where archivecalls.startdatetime >= $startDatetime
and archivecalls.enddatetime <= $endDatetime 
group by opid; ");
        $result = $command->queryAll();

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
        $startDate_Shamsi = '';
        $endDate_Shamsi = '';
        if (Yii::$app->request->post('sdate') != '') {
            $startDate_Shamsi = Yii::$app->request->post('sdate');
        }
        if (Yii::$app->request->post('edate') != '') {
            $endDate_Shamsi = Yii::$app->request->post('edate');
        }
        if (Yii::$app->request->get('startDate') != '') {
            $startDate_Shamsi = Yii::$app->request->get('startDate');
        }
        if (Yii::$app->request->get('endDate') != '') {
            $endDate_Shamsi = Yii::$app->request->get('endDate');
        }
        if (Yii::$app->request->post('selection') != '') {
            $select_array = (array)Yii::$app->request->post('selection');
            $operators = $this->select($select_array);
        }
        if (Yii::$app->request->get('selection') != '') {
            $operators = Yii::$app->request->get('selection');
        }
        $tmp1 = explode('/', $startDate_Shamsi);
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');

        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT archivecalls.opnumber, count(archivecalls.opnumber) as 'all', 
sum(talktime) as total,operators.name as name,operators.family as family,
tmp.oral as oral,tmp.unrelated as unrelated,tmp.noinfo as noinfo,
tmp.disturber as disturber FROM archiveCalls
join operators on archivecalls.opid = operators.opid
join city on archivecalls.cityId = city.id
join (SELECT opnumber,logindatetime,SUM(endcall7) as oral, SUM(endcall8) as unrelated,
SUM(endcall9) as noinfo, SUM(endcall11) as disturber from archiveOperators 
GROUP BY opnumber ) as tmp 
on archivecalls.opnumber = tmp.opnumber 
and tmp.logindatetime >= $startDatetime
and tmp.logindatetime <=$endDatetime
 WHERE  startdatetime >= $startDatetime  AND
  startdatetime <= $endDatetime and
  calllaststate IN (301,304,203) and
   archivecalls.opnumber in ($operators)
    GROUP BY opnumber;");

        $result = $command->queryAll();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        return $this->render('operatorAverageReport',[
            'dataProvider'=>$dataProvider,
            'startdate' => $startDate_Shamsi,
            'enddate' => $endDate_Shamsi,
            'selection_array' => $operators,
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
