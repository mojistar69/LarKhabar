<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Manager */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'مدیر', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="manager-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
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
            'name',
            'family',
            'username',
            [
                'attribute' => 'accessType',
                'value' => function ($Model) {
                    if ($Model['accessType']==1)
                        return 'مدیر ناحیه' ;
                    else if ($Model['accessType']==2)
                        return 'مدیر ارشد' ;
                    else if ($Model['accessType']==3)
                        return 'مدیر کل' ;

                },
            ],
            'phoneNumber',
            'mobileNumber',
        ],
    ]) ?>

</div>
