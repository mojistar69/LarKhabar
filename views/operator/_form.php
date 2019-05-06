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

        <!-- /.box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات فردی</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'opnumber')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'type'=>'number',
                        'placeholder'=>'شماره اپراتور']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => 30,
                        'style'=>'width:200px','placeholder'=>'نام']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'family')->textInput(['maxlength' => 30,
                        'style'=>'width:200px','placeholder'=>'نام خانوادگی']) ?>
                </div>

                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="Operator[sex]" checked="true" id="optionsRadios2" value="1">
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
                    <?= $form->field($model, 'phone')->textInput(['style'=>'width:160px','type'=>'number',
                        'placeholder'=>'07152344744 مثال']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'mobile')->textInput(['style'=>'width:160px','type'=>'number',
                        'placeholder'=>'09332517700 مثال']) ?>
                </div>
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
                <h3 class="box-title">اطلاعات کاربری</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'user')->textInput(['maxlength' => 30,'style'=>'width:200px'
                    ]) ?>
                </div>

                <div class="form-group">
                        <?= $form->field($model, 'pass')->passwordInput(['maxlength' => 30,'style'=>'width:200px']) ?>
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
