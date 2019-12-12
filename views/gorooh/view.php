<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gorooh */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'گروه ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gorooh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'آ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'onvan',
                'label' => 'عنوان',
            ],
            [
                'label' => 'عکس',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value'=>function($data) { return $data->imageurl; },
            ],
            [
                'attribute' => 'ax',
                'label' => 'آدرس عکس',
            ],
        ],
    ]) ?>

</div>
