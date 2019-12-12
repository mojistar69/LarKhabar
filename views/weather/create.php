<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Weather */

$this->title = 'ایجاد شهر';
$this->params['breadcrumbs'][] = ['label' => 'آب و هوا', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weather-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
