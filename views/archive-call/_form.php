<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Archivecall */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivecall-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lastcallid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operatorchain')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startdatetime')->textInput() ?>

    <?= $form->field($model, 'enddatetime')->textInput() ?>

    <?= $form->field($model, 'calllaststate')->textInput() ?>

    <?= $form->field($model, 'callerid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cityid')->textInput() ?>

    <?= $form->field($model, 'zoneid')->textInput() ?>

    <?= $form->field($model, 'talktime')->textInput() ?>

    <?= $form->field($model, 'opnumber')->textInput() ?>

    <?= $form->field($model, 'opid')->textInput() ?>

    <?= $form->field($model, 'serverid')->textInput() ?>

    <?= $form->field($model, 'callednumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'channel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'record')->textInput() ?>

    <?= $form->field($model, 'responses')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
