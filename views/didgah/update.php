<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Didgah */

$this->title = 'ویرایش دیدگاه ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'دیدگاه', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ویرایش';
?>
<div class="didgah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
