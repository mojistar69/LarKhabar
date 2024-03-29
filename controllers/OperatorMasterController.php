<?php

namespace app\controllers;
use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;


class OperatorMasterController extends \yii\web\Controller
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
                        'actions' => ['index','grid','selected'],
                        'roles' => ['admin','manager'],
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index','grid','selected'],
                        'roles' => ['?'],
                    ],
                ],
            ],

        ];
    }
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

        if (isset($_GET["startDate"])) {
            $startDate_Shamsi = $_GET["startDate"];
        }
        else
            return;
        if (isset($_GET["endDate"])) {
            $endDate_Shamsi = $_GET["endDate"];
        }
        else
            return;

        $tmp1 = explode('/',$startDate_Shamsi );
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');

        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';

       $dataProvider=$this->doQuery($startDatetime,$endDatetime);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'startDatetime' => $startDate_Shamsi,
            'endDatetime' => $endDate_Shamsi,
        ]);

    }
    public function actionSelected()
    {
        $startDate_Shamsi = '';
        $endDate_Shamsi = '';
        $operators = '';

        if (isset($_GET["startDate"])) {
            $startDate_Shamsi = $_GET["startDate"];
        }
        if (isset($_GET["endDate"])) {
            $endDate_Shamsi = $_GET["endDate"];
        }
        if (isset($_GET["selection"])&& is_array($_GET["selection"])) {
            $select_array = (array)$_GET["selection"];
            $operators = $this->select($select_array);
        }
        if (isset($_GET["selection"]) && !is_array($_GET["selection"]
            )) {
            $operators = Yii::$app->request->get('selection');
        }

        $tmp1 = explode('/', $startDate_Shamsi);
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        $startDatetime = $startDate_Miladi . ' 00:00:00';
        $endDatetime = $endDate_Miladi . ' 00:00:00';

        $dataProvider=$this->doQuerySelected($operators,$startDatetime,$endDatetime);
        return $this->render('operatorMasterReport',
            ['dataProvider' => $dataProvider,
                'startdate' => $startDate_Shamsi,
                'enddate' => $endDate_Shamsi,
                'selection_array' => $operators,
        ]);
    }
    public function doQuerySelected($operators,$startDatetime,$endDatetime)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call selectmaster(:operators,:startdate,:enddate)")
            ->bindValue(':operators', $operators)
            ->bindValue(':startdate', $startDatetime)
            ->bindValue(':enddate', $endDatetime);
        $result = $command->queryAll();
        $dataProvider = new ArrayDataProvider(['allModels' => $result,]);
        $dataProvider->pagination->pageSize=10;
        return $dataProvider;
    }
    public function doQuery($startDatetime,$endDatetime)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("select *
from archivecalls 
join operators on archivecalls.opid = operators.opid 
where archivecalls.startdatetime >= $startDatetime
and archivecalls.enddatetime <= $endDatetime 
");
        $result = $command->queryAll();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);
        $dataProvider->pagination->pageSize=10;
        return $dataProvider;
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
    public function select($select_array)
    {
        $selection_str = '';
        foreach ($select_array as $s) {
            $selection_str = $selection_str . ',' . $s;
        }
        $selection_str = substr($selection_str, 1, strlen($selection_str));
        return $selection_str;
    }




}
