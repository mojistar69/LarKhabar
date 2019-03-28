<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArchiveCallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Archivecalls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivecall-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Archivecall', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'calluid',
            'lastcallid',
            'operatorchain',
            'startdatetime',
            'enddatetime',
            //'calllaststate',
            //'callerid',
            //'cityid',
            //'zoneid',
            //'talktime:datetime',
            //'opnumber',
            //'opid',
            //'serverid',
            //'callednumber',
            //'channel',
            //'record',
            //'responses',
            //'service',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
