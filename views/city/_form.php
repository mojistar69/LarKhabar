<?php
/* @var $this yii\web\View */

use app\models\Zone;
use yii\helpers\ArrayHelper;
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
                    <?= $form->field($model, 'headernumber')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'placeholder'=>' سر شماره']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'newheadernumber')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'placeholder'=>' سر شماره دوم']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'priority')->textInput(['maxlength' => 30,'style'=>'width:70px',
                        'placeholder'=>'اولویت']) ?>
                </div>

                <div class="form-group">
                    <?php
                    $zones = ArrayHelper::map(Zone::find()->all(), 'id', 'name');
                    ?>
                    <label> &nbsp;&nbsp;منطقه</label>
                    <?= Html::dropDownList("City[zoneid]", null, $zones, ['prompt' => 'انتخاب', 'id' => 'zoneId', 'class' => 'form-control','options' => [$model->zoneid => ['Selected'=>'selected']]]) ?>
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

