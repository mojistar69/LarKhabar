<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Khabar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'خبرها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="khabar-view">

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
            'lid:ntext',
            [
                'attribute' => 'goroohname',
                'value' => function($model) { return $model['tbl_gorooh']['onvan']  ;},
                'label' => 'گروه',
            ],
            'titr:ntext',
            'roo_titr:ntext',
            'matn:ntext',
            [
                'label' => ' عکس کوچک',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value'=>function($data) { return $data->imageurlk; },
            ],
            [
                'attribute' => '',
                'value' => function($model) {
                    return $model['ax_k'];
                }
            ],
            [
                'label' => 'عکس بزرگ',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value'=>function($data) { return $data->imageurlb; },
            ],
            [
                'attribute' => '',
                'value' => function($model) {
                    return $model['ax_b'];
                }
            ],
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
            'manba:ntext',
            'film:ntext',
            'film_aparat:ntext',
            'film_onvan:ntext',
            'slide',
            [
                'attribute' => 'taeed',
                'value' => function($model) {
                    if ($model['taeed']==1)  return 'تایید';
                    else return 'عدم تایید';},
                'headerOptions' => ['width' => '180'],
                'label' => '  وضعیت تایید'
            ],
            'view',
//            'viewtype',
//            'view_fm',
        ],
    ]) ?>

</div>
