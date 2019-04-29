<?php

namespace app\controllers;
use app\models\ArchiveCallSearch;
use Yii;
use yii\data\ArrayDataProvider;
class DisturberController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index',
            ['startDatetime'=>'1390/01/01',
                'endDatetime'=>'1398/01/01'
            ]);
    }

    public function actionGrid()
    {
        $startDate='2019-01-01';
        $endDate ='2019-01-02';
        if (Yii::$app->request->post('startDate') != '') {
            $tmp1 = explode('/', Yii::$app->request->post('startDate'));
            $startDate = $this->jalali_to_gregorian($tmp1[0], $tmp1[1], $tmp1[2], '-');
        }
        if (Yii::$app->request->post('endDate') != '') {
            $tmp2 = explode('/', Yii::$app->request->post('endDate'));
            $endDate = $this->jalali_to_gregorian($tmp2[0], $tmp2[1], $tmp2[2], '-');
        }
        $startDatetime =  $startDate . ' 00:00:00';
        $endDatetime = $endDate . ' 00:00:00';

        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("call spsDisturber_GetAllByCityCodesAndOpNumber(:startDateTime,:endDateTime,:callerId,
        :cityCodes,:limit,:opNumber)")
            ->bindValue(':startDateTime', $startDatetime)
            ->bindValue(':endDateTime', $endDatetime)
            ->bindValue(':callerId', '')
            ->bindValue(':cityCodes', '')
            ->bindValue(':limit', '')
            ->bindValue(':opNumber', '');
        $result = $command->queryAll();
        $dataProvider= new ArrayDataProvider(['allModels'=>$result,]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'startDatetime' => Yii::$app->request->post('startDate'),
            'endDatetime' => Yii::$app->request->post('endDate'),
        ]);









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