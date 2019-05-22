<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Archiveoperator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archiveoperator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'logindatetime')->textInput() ?>

    <?= $form->field($model, 'logoffdatetime')->textInput() ?>

    <?= $form->field($model, 'rcvcall')->textInput() ?>

    <?= $form->field($model, 'anscall')->textInput() ?>

    <?= $form->field($model, 'nanscalls')->textInput() ?>

    <?= $form->field($model, 'opnumber')->textInput() ?>

    <?= $form->field($model, 'opid')->textInput() ?>

    <?= $form->field($model, 'cityId')->textInput() ?>

    <?= $form->field($model, 'operatorrequest')->textInput() ?>

    <?= $form->field($model, 'supervisorconfirm')->textInput() ?>

    <?= $form->field($model, 'endcall7')->textInput() ?>

    <?= $form->field($model, 'endcall8')->textInput() ?>

    <?= $form->field($model, 'endcall9')->textInput() ?>

    <?= $form->field($model, 'endcall11')->textInput() ?>

    <?= $form->field($model, 'localip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
