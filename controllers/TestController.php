<?php

namespace app\controllers;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $show_modal = true;
        return $this->render('index',['show_modal'=>$show_modal]);
    }

}
