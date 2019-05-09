<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'منطقه';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Zone', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'defaultCityCode',
            'waitingTime:datetime',
            'waitingDeviation',
            //'defaultCityId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
