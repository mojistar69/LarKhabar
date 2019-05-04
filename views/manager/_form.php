<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->

        <div class="box box-danger ">
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
        <!-- /.box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات کاربری</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'placeholder'=>'نام کاربری']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 30,'style'=>'width:200px']) ?>
                </div>

                <div class="form-group field-manager-password">
                    <label class="control-label" for="manager-password"> تکرار رمز عبور</label>
                    <input type="password" id="manager-re-password" class="form-control" name="repassword"  maxlength="30"
                    style="width: 200px">
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">

            </div>

        </div>
        <!-- Form Element sizes -->

        <!-- /.box -->

    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- Horizontal Form -->

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات فردی</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => 30,'style'=>'width:200px'
                        ]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'family')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'placeholder'=>'نام خانوادگی ']) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'phoneNumber')->textInput(['style'=>'width:160px','type'=>'number',
                        'placeholder'=>'07152344744 مثال']) ?>
                </div>

                <div class="form-group">
                <?= $form->field($model, 'mobileNumber')->textInput(['style'=>'width:160px','type'=>'number',
                    'placeholder'=>'09332517700 مثال']) ?>
                </div>

            </div>
            <!-- /.box-body -->

        </div>
        <div align="center">
            <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success',
                'onClick'=>'validatePassword();']) ?>
        </div>

        <!-- /.box -->
    </div>
    <!--/.col (right) -->
</div>
<?php ActiveForm::end(); ?>

<script>
    function validatePassword() {

        var pass = $('#password').val();
        var repass = $('#confirmpassword').val();
        if (pass.length >= 6 && repass.length>=6) {
            if (pass == repass) {
                alert('matched')
            }
            else {
                alert('no')
            }
        }
        else {
            alert('less than 6 char')
        }
    }
</script>
