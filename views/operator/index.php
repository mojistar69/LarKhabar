<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'اپراتورها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ایجاد اپراتور', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= $dataProvider->pagination->pageSize=10;?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'family',
            'user',
//            'opnumber',
//            'state',
//            'pass',
            //'citycode',
            //'cityid',
//            'activate',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
