<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backendusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backenduser-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Backenduser', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstName',
            'lastName',
            'username',
            'password',
            //'authKey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
