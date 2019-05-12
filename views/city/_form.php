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
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'placeholder'=>'نام شهر']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'code')->textInput(['maxlength' => 6,'type'=>'number',
                        'style'=>'width:200px','placeholder'=>'مثال 712462']) ?>
                </div>

                <div class="form-group ">
                    <?= $form->field($model, 'headernumber')->textInput(['maxlength' => 30,
                        'style'=>'width:200px','placeholder'=>'مثال 1183542x']) ?>

                </div>
            </div>
            <div class="form-group">
                <div align="center">
                    <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
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




        <!-- /.box -->
    </div>
    <!--/.col (right) -->
</div>
<?php ActiveForm::end(); ?>

