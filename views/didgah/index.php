<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'دیدگاه';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="didgah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد دیدگاه', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                'attribute' => 'g_id',
                'format' => 'raw',
                'value' => 'g_id',
                'headerOptions' => ['width' => '100'],
                'label' => 'آیدی خبر',
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => 'name',
                'headerOptions' => ['width' => '100'],
                'label' => 'صاحب دیدگاه',
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
