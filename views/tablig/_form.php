<?php

use app\controllers\ChangeDate;
use app\models\Gorooh;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger ">
            <div class="box-header with-border">
                <h3 class="box-title">تبلیغ</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <?php
                    $items = ArrayHelper::map(Gorooh::find()->all(), 'id', 'onvan');
                    ?>
                    <?=$form->field($model, 'g_id')->dropDownList($items,[
                        'style' => 'width:200px !important',
                    ])->label('گروه')
                    ?>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'File1')->fileInput()->label('نمایش در لیست خبرها') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'File2')->fileInput()->label('نمایش در اکتیویتی مربوط به خبر') ?>
                    </div>


            </div>
                <div class="form-group">
                    <?= $form->field($model, 'url_link')->textarea(['rows' => 1]) ?>
                </div>

        </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-warning ">
            <div class="box-header with-border">
                <h3 class="box-title">تبلیغ پیشفرض</h3>
            </div>
            <div class="box-body">

                <div class="col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'File3')->fileInput()->label('نمایش در لیست خبرها') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'File4')->fileInput()->label('نمایش در اکتیویتی مربوط به خبر ') ?>
                    </div>


                </div>
                <div class="form-group">
                    <?= $form->field($model, 'url_link_d')->textarea(['rows' => 1]) ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">بازه ابتدا</h3>
            </div>
            <div class="box-body">

                <!-- Time -->
                <!-- /.form group -->


                <!-- Date dd/mm/yyyy -->
                <div class="form-group">

                    <div class="input-group" align="left">
                        <?php
                        $d=$model->tarikh_start;
                        if(isset($d) and $d!=''){
                            $t = explode('-',$d);
                        }
                        else
                        {
                            $miladi_today=date("Y/m/d");
                            $t = explode('/',$miladi_today);
                        }
                        $chdt=new ChangeDate();
                      //  $sdate=$chdt->gregorian_to_jalali($t[0], $t[1], $t[2],'/');

                        echo $form->field($model, 'tarikh_start')->widget(jDate\DatePicker::className()) ?>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->



            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.box -->
    </div>
    <div class="col-md-6">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">بازه انتها</h3>
            </div>
            <div class="box-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                    <div class="input-group" align="left">

                        <?php
                        $d=$model->tarikh_end;
                        if(isset($d) and $d!=''){
                        $t = explode('-',$d);
                        }
                        else
                        {
                        $miladi_today=date("Y/m/d");
                        $t = explode('/',$miladi_today);
                        }
                        $chdt=new ChangeDate();
                       // $edate=$chdt->gregorian_to_jalali($t[0], $t[1], $t[2],'/');

                        echo $form->field($model, 'tarikh_end')->widget(jDate\DatePicker::className()) ?>

                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                    <!-- /.input group -->

                    <!-- /.form group -->




                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

