<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\operator */
/* @var $form ActiveForm */
?>
<div class="test">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'opnumber') ?>
        <?= $form->field($model, 'pass') ?>
        <?= $form->field($model, 'user') ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'family') ?>
        <?= $form->field($model, 'state') ?>
        <?= $form->field($model, 'citycode') ?>
        <?= $form->field($model, 'cityid') ?>
        <?= $form->field($model, 'activate') ?>
        <?= $form->field($model, 'sex') ?>
        <?= $form->field($model, 'supervisorconfirm') ?>
        <?= $form->field($model, 'showcallerid') ?>
        <?= $form->field($model, 'showstatistics') ?>
        <?= $form->field($model, 'serviceenabled') ?>
        <?= $form->field($model, 'operationtype') ?>
        <?= $form->field($model, 'opnumberpre') ?>
        <?= $form->field($model, 'currentcallid') ?>
        <?= $form->field($model, 'vUser') ?>
        <?= $form->field($model, 'vPass') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'mobile') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- test -->
