<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Manager */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manager-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">سطح دسترسی</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="Manager[accessType]" id="optionsRadios1" value="1" checked="">
                            مدیر ناحیه
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="Manager[accessType]" id="optionsRadios2" value="2">
                            مدیر ارشد
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="Manager[accessType]" id="optionsRadios3" value="3" >
                            مدیر کل
                        </label>
                    </div>
                </div>
            </div>

    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">مشخصات فردی</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'phoneNumber')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'mobileNumber')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
            <!-- /.box-body -->

    </div>

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">مشخصات کاربری</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group field-manager-password">
                    <label class="control-label" for="manager-password"> تکرار رمز عبور</label>
                    <input type="password" id="manager-re-password" class="form-control" name="Manager[password]" maxlength="45">
                    <div class="help-block"></div>
                </div>
            </div>
    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
