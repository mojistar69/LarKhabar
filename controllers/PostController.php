<?php

namespace app\controllers;
use models\Post;
use app\models\LoginForm;
use yii\web\Controller;

class PostController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionNew()
    {

          $model= new Post();
        if($model->load(yii::$app->request->post() && $model->validate()) ){
            $model->save();
            $this->render('_show',['model'=>$model]);
        }
        else
            $this->render('_show',['model'=>$model]);

    }

}
