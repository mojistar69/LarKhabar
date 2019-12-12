<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SpeakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'حرف مردم';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speak-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => 'id',
                'headerOptions' => ['width' => '10'],
                'label' => ' آیدی',
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => 'name',
                'headerOptions' => ['width' => '100'],
                'label' => 'نام',
            ],

            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => 'email',
                'headerOptions' => ['width' => '100'],
                'label' => 'ایمیل',
            ],
            [
                'attribute' => 'matn',
                'format' => 'raw',
                'value' => 'matn',
                'headerOptions' => ['width' => '100'],
                'label' => 'متن',
            ],
            [
                'attribute' => 'tarikh',
                'format' => 'raw',
                'headerOptions' => ['width' => '180'],
                'contentOptions' => ['style' => 'max-width: 80px'],
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['tarikh']);
                    return Yii::$app->jdate->date("o/n/d – H:i:s", (int)strtotime($date->format('Y-m-d H:i:s')));
                },
            ],
            [
                'attribute' => 'taeed',
                'format' => 'raw',
                'value' => function($model) {
                    if ($model['taeed']==1)  return '<span class="label label-success">تایید</span>';
                    else return '<span class="label label-danger">عدم تایید</span>';},
                'headerOptions' => ['width' => '100'],
                'filter'=>array("1"=>"تایید","0"=>"عدم تایید"),
                'label' => ' وضعیت'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
