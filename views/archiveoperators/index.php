<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArchiveOperatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Archiveoperators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archiveoperators-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Archiveoperators', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'logindatetime',
            'logoffdatetime',
            'rcvcall',
            'anscall',
            //'nanscalls',
            //'opnumber',
            //'opid',
            //'cityId',
            //'operatorrequest',
            //'supervisorconfirm',
            //'endcall7',
            //'endcall8',
            //'endcall9',
            //'endcall11',
            //'localip',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
