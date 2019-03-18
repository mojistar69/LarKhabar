<?php

namespace app\controllers;
use app\models\Operator;
use app\models\Zone;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
