<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Weather */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'آب و هوا', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="weather-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا مطمئن هستید حذف شود؟',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nam_city',
            'c_url:ntext',
            [
                'attribute' => 'taeed',
                'value' => function($model) {
                    if ($model['taeed']==1)  return 'تایید';
                    else return 'عدم تایید';},
                'headerOptions' => ['width' => '180'],
                'label' => '  وضعیت تایید'
            ],
        ],
    ]) ?>

</div>
