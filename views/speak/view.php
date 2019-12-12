<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Speak */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'حرف مردم', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="speak-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا مطمئن هستید می خواهید حذف نمایید؟',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'email:ntext',
            'matn:ntext',
            [
                'attribute' => 'tarikh',
                'format' => 'raw',
                'headerOptions' => ['width' => '180'],
                'contentOptions' => ['style' => 'max-width: 80px'],
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['tarikh']);
                    return Yii::$app->jdate->date("o/n/d – H:i:s", (int)strtotime($date->format('Y-m-d H:i:s')));
                },
            ],
            [
                'attribute' => 'taeed',
                'value' => function($model) {
                    if ($model['taeed']==1)  return 'تایید';
                    else return 'عدم تایید';},
                'headerOptions' => ['width' => '180'],
                'label' => ' وضعیت'
            ],
        ],
    ]) ?>

</div>
