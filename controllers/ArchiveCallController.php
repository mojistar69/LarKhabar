<?php

namespace app\controllers;
use Yii;
use app\models\Archivecall;
use app\models\ArchivecallSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class ArchivecallController extends Controller
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
        $searchModel = new ArchivecallSearch();
        $startDate_Shamsi='1398/03/01';
        $endDate_Shamsi ='1398/03/12';
        //change shamsi to miladi
        $tmp1 = explode('/',$startDate_Shamsi );
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';
        $tmp=Yii::$app->request->queryParams;
        $tmp['startdate']=$startDatetime;
        $tmp['enddate']=$endDatetime;
        $dataProvider = $searchModel->search($tmp);
        return $this->render('index', [
            'startDatetime'=>'1398/03/01',
            'endDatetime'=>'1398/03/12',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionGrid()
    {
        $searchModel = new ArchivecallSearch();
        $startDate_Shamsi='';
        $endDate_Shamsi ='';
        if (isset($_GET["startDate"])) {
            $startDate_Shamsi = $_GET["startDate"];
        }
        if (isset($_GET["endDate"])) {
            $endDate_Shamsi = $_GET["endDate"];
        }
        //change shamsi to miladi
        $tmp1 = explode('/',$startDate_Shamsi );
        $startDate_Miladi = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        $tmp2 = explode('/', $endDate_Shamsi);
        $endDate_Miladi = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        $startDatetime = '\'' . $startDate_Miladi . ' 00:00:00\'';
        $endDatetime = '\'' . $endDate_Miladi . ' 00:00:00\'';
        $tmp=Yii::$app->request->queryParams;
        $tmp['startdate']=$startDatetime;
        $tmp['enddate']=$endDatetime;
        $dataProvider = $searchModel->search($tmp);
        return $this->render('index', [
            'startDatetime'=>$startDate_Shamsi,
            'endDatetime'=>$endDate_Shamsi,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
}
//change shmasi to miladi
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
