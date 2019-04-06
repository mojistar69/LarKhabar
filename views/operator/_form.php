<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operator-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">مشخصات فردی</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <div class="form-group">
                <?= $form->field($model, 'opnumber')->textInput() ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">

                <div class="radio">
                    <label>
                        <input type="radio" name="Operator[sex]" id="optionsRadios2" value="1">
                        مرد
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="Operator[sex]" id="optionsRadios3" value="0" >
                        زن
                    </label>
                </div>

            </div>
            <div class="form-group">
                <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>            </div>
        </div>
        <!-- /.box-body -->

    </div>

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">اطلاعات کاربری</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">
            <div class="form-group">
                <?= $form->field($model, 'user')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true]) ?>
            </div>


    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
