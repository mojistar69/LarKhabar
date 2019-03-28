<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Operator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'opid',
//            'opnumber',
//            'currentcallid',
//            'state',
//            'pass',
            //'user',
            //'citycode',
            //'cityid',
            //'activate',
            'name',
            'family',
            //'phone',
            //'mobile',
            //'sex',
            //'supervisorconfirm',
            //'showcallerid',
            //'showstatistics',
            //'serviceenabled',
            //'operationtype',
            //'opnumberpre',
            //'vUser',
            //'vPass',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
