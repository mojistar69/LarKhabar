<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messageofusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messageofuser-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Messageofuser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'operator.name',
            'operator.family',
            //'senderType',
            //'senderId',
            //'receiveType',
            //'receiveId',
            'message.body',
            [
                'attribute' => Yii::t('app', 'تاریخ ارسال'),
                'format' => 'raw',
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['sendDate']);
                    return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                },
            ],
            [
                'attribute' => Yii::t('app', 'تاریخ مشاهده'),
                'format' => 'raw',
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['sendDate']);
                    return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                },
            ],

            //'messageId',
            //'state',
            //'sendDate',
            //'seenDate',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
