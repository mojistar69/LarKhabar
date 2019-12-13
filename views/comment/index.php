<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ارسال نظرات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

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
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 20px'],
                'headerOptions' => ['width' => '20'],
                'label' => ' آیدی',
            ],
            [

                'attribute' => 'name',
                'value' => 'name',
                'contentOptions' => ['style' => 'font-size:12px;'],
                'label' => 'نام',
                'enableSorting' => false,
            ],
            [

                'attribute' => 'email',
                'value' => 'email',
                'contentOptions' => ['style' => 'font-size:12px;'],
                'label' => 'ایمیل',
                'enableSorting' => false,
            ],
            [

                'attribute' => 'matn',
                'value' => 'matn',
                'contentOptions' => ['style' => 'font-size:12px;'],
                'label' => 'متن',
                'enableSorting' => false,
            ],
            //                            //Tarikh
            [
                'attribute' => 'tarikh',
                'format' => 'html',
                'headerOptions' => ['width' => '120'],
                'enableSorting' => false,
                'contentOptions' => ['style' => 'max-width: 60px'],
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['tarikh']);
                    return Yii::$app->jdate->date("o/n/d – H:i:s", (int)strtotime($date->format('Y-m-d H:i:s')));
                },
                'filter' =>  jDate\DatePicker::widget([
                    'model' => $searchModel, 'attribute' => 'tarikh',
                ]) ,

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
