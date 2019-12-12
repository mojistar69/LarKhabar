<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Weather */

$this->title = 'ویرایش آب وهوا' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'آب و هوا', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ویرایش';
?>
<div class="weather-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
