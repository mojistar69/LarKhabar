<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'آب وهوا';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weather-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('اضافه نمودن شهر', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nam_city',
            'c_url:ntext',
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
