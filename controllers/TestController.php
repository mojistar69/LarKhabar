<?php

namespace app\controllers;
use app\models\ArchiveCallSearch;
use app\models\Khabar;
use Yii;
use yii\data\ArrayDataProvider;


class TestController extends \yii\web\Controller
{
    public function actionIndex()
            
    {
        $model = new Khabar();
        return $this->render('index', [
            'model' => $model,

        ]);
    }





}
