<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Backenduser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="backenduser-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
