<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArchiveOperatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archiveoperators-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'logindatetime') ?>

    <?= $form->field($model, 'logoffdatetime') ?>

    <?= $form->field($model, 'rcvcall') ?>

    <?= $form->field($model, 'anscall') ?>

    <?php // echo $form->field($model, 'nanscalls') ?>

    <?php // echo $form->field($model, 'opnumber') ?>

    <?php // echo $form->field($model, 'opid') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <?php // echo $form->field($model, 'operatorrequest') ?>

    <?php // echo $form->field($model, 'supervisorconfirm') ?>

    <?php // echo $form->field($model, 'endcall7') ?>

    <?php // echo $form->field($model, 'endcall8') ?>

    <?php // echo $form->field($model, 'endcall9') ?>

    <?php // echo $form->field($model, 'endcall11') ?>

    <?php // echo $form->field($model, 'localip') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
