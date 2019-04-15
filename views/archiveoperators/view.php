<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Archiveoperators */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Archiveoperators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="archiveoperators-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'logindatetime',
            'logoffdatetime',
            'rcvcall',
            'anscall',
            'nanscalls',
            'opnumber',
            'opid',
            'cityId',
            'operatorrequest',
            'supervisorconfirm',
            'endcall7',
            'endcall8',
            'endcall9',
            'endcall11',
            'localip',
        ],
    ]) ?>

</div>
