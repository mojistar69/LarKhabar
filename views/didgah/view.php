<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Didgah */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'دیدگاه', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="didgah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا برای حذف اطمینان دارید؟',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'g_id',
            'name',
            'email:email',
            'matn:ntext',
            [
                'attribute' => ' تاریخ درج خبر',
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
