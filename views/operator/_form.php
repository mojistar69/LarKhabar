<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'opnumber')->textInput() ?>

    <?= $form->field($model, 'currentcallid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'citycode')->textInput() ?>

    <?= $form->field($model, 'cityid')->textInput() ?>

    <?= $form->field($model, 'activate')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'supervisorconfirm')->textInput() ?>

    <?= $form->field($model, 'showcallerid')->textInput() ?>

    <?= $form->field($model, 'showstatistics')->textInput() ?>

    <?= $form->field($model, 'serviceenabled')->textInput() ?>

    <?= $form->field($model, 'operationtype')->textInput() ?>

    <?= $form->field($model, 'opnumberpre')->textInput() ?>

    <?= $form->field($model, 'vUser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vPass')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
