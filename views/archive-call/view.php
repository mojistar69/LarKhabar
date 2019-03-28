<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\archivecall */

$this->title = $model->calluid;
$this->params['breadcrumbs'][] = ['label' => 'Archivecalls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="archivecall-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->calluid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->calluid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'calluid',
            'lastcallid',
            'operatorchain',
            'startdatetime',
            'enddatetime',
            'calllaststate',
            'callerid',
            'cityid',
            'zoneid',
            'talktime:datetime',
            'opnumber',
            'opid',
            'serverid',
            'callednumber',
            'channel',
            'record',
            'responses',
            'service',
        ],
    ]) ?>

</div>
