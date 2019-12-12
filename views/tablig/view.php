<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tablig */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'تبلیغ ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tablig-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آیا مطمئن هستید می خواهید حذف کنید؟',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'goroohname',
                'value' => function($model) { return $model['tbl_gorooh']['onvan']  ;},
                'label' => 'گروه',
            ],
            'url_list:ntext',
            'url_info:ntext',
            'url_link:ntext',
            'url_list_d:ntext',
            'url_info_d:ntext',
            'url_link_d:ntext',
            [
                'attribute' => ' تاریخ شروع',
                'format' => 'raw',
                'headerOptions' => ['width' => '180'],
                'contentOptions' => ['style' => 'max-width: 80px'],
                     'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['tarikh_start']);
                    return Yii::$app->jdate->date("o/n/d", (int)strtotime($date->format('Y-m-d')));
                },
            ],
            [
                'attribute' => ' تاریخ پایان',
                'format' => 'raw',
                'headerOptions' => ['width' => '180'],
                'contentOptions' => ['style' => 'max-width: 80px'],
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['tarikh_end']);
                    return Yii::$app->jdate->date("o/n/d", (int)strtotime($date->format('Y-m-d')));
                },
            ],
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
