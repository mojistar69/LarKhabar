<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'اپراتور', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="operator-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('بروزرسانی', ['update', 'id' => $model->opid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->opid], [
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

            'opnumber',

//            'state',

            'user',

//            'activate',
            'name',
            'family',
            'phone',
            'mobile',
            [
                'attribute' => 'sex',
                'value' => function ($Model) {
                if ($Model['sex']==0)
                    return 'زن' ;
                else if ($Model['sex']==1)
                      return 'مرد' ;
                },
            ],

        ],
    ]) ?>

</div>
