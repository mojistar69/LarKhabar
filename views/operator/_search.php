<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperatorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'opid') ?>

    <?= $form->field($model, 'opnumber') ?>

    <?= $form->field($model, 'currentcallid') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'pass') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'citycode') ?>

    <?php // echo $form->field($model, 'cityid') ?>

    <?php // echo $form->field($model, 'activate') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'family') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'supervisorconfirm') ?>

    <?php // echo $form->field($model, 'showcallerid') ?>

    <?php // echo $form->field($model, 'showstatistics') ?>

    <?php // echo $form->field($model, 'serviceenabled') ?>

    <?php // echo $form->field($model, 'operationtype') ?>

    <?php // echo $form->field($model, 'opnumberpre') ?>

    <?php // echo $form->field($model, 'vUser') ?>

    <?php // echo $form->field($model, 'vPass') ?>

    <div class="form-group">
        <?= Html::submitButton('جستجو', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('ریسیت', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
