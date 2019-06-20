<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DisturberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disturber-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'callerid') ?>

    <?= $form->field($model, 'opid') ?>

    <?= $form->field($model, 'opnumber') ?>

    <?= $form->field($model, 'calluid') ?>

    <?php // echo $form->field($model, 'callid') ?>

    <?php // echo $form->field($model, 'd_date') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
