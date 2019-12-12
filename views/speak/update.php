<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Speak */

$this->title = 'ویرایش حرف مردم ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '  حرف مردم ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ویرایش';
?>
<div class="speak-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
