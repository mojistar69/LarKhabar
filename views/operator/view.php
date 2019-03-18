<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Operators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operator-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->opid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->opid], [
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
            'opid',
            'opnumber',
            'currentcallid',
            'state',
            'pass',
            'user',
            'citycode',
            'cityid',
            'activate',
            'name',
            'family',
            'phone',
            'mobile',
            'sex',
            'supervisorconfirm',
            'showcallerid',
            'showstatistics',
            'serviceenabled',
            'operationtype',
            'opnumberpre',
            'vUser',
            'vPass',
        ],
    ]) ?>

</div>
