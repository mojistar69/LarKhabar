<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'شهر';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(' ثبت شهر ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $dataProvider->pagination->pageSize=10;?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'code',



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

