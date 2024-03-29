<?php
/* @var $this yii\web\View */

use app\models\Gorooh;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">

    <div class="col-md-6">
        <div class="box box-danger ">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات کلی خبر</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'lid')->textarea(['rows' => 1,'maxlength' => 90,'style'=>'width:200px',
                        'placeholder'=>'لید خبر']) ?>
                </div>

                <div class="form-group">
                    <?php
                    $items = ArrayHelper::map(Gorooh::find()->all(), 'id', 'onvan');
                    ?>
                    <?=$form->field($model, 'gorooh')->dropDownList($items,[
                        'style' => 'width:200px !important',
                    ])->label('گروه خبر')
                    ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'titr')->textarea(['rows' => 1,'maxlength' => 90,'style'=>'width:200px',
                        'placeholder'=>'تیتر']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'roo_titr')->textarea(['rows' => 2,'maxlength' => 240,'style'=>'width:400px',
                        'placeholder'=>'رو تیتر']) ?>
                </div>
            </div>

        </div>
        <!-- /.box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">انتخاب عکس خبر</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <?php
                    $url_k=substr($model->ax_k,4,strlen($model->ax_k)-4);
                    $url_b=substr($model->ax_b,4,strlen($model->ax_b)-4);
                    ?>
                <div class="form-group">
                    <?= $form->field($model, 'musicFile1')->fileInput()->label('انتخاب فایل عکس کوچک جهت بارگذاری') ?>
                </div>
                    <img src="<?=$url_k?>" height="50" width="50" alt="عکس کوچک">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'musicFile2')->fileInput()->label('انتخاب فایل عکس بزرگ جهت بارگذاری') ?>
                    </div>
                    <img src="<?=$url_b?>" height="75" width="75" alt="عکس بزرگ">
                </div>
                <div class="col-md-8">

                    <div class="form-group">
                        <?= $form->field($model, 'File3')->fileInput()->label('انتخاب فایل فیلم یا صوت جهت بارگذاری') ?>
                    </div>
                    </div>
                 <div class="col-md-12">
                        <div class="col-md-3">
                        <row> <br> </row>
                        <row>
                            <a href="<?= Yii::$app->homeUrl ?>?r=khabar/remove">
                                <i class="fa fa-remove"></i> <span>حذف فیلم</span>
                                <span class="pull-left-container">
            </span>
                            </a>
                        </row>
                        </div>
                        <div class="col-md-9">
                        <?= $form->field($model, 'film')->textarea(['rows' => 1,'disabled'=>'true'])->label(' فیلم یا صوت بارگذاری شده') ?>
                        </div>

                    </div>

                <div class="form-group">
                    <?= $form->field($model, 'film_aparat')->textarea(['rows' => 1]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'film_onvan')->textarea(['rows' => 1])->label('عنوان فیلم') ?>                </div>
            </div>
            </div>

        </div>

    <div class="col-md-6">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">متن خبر</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'matn')->textarea(['rows' => 10]) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'manba')->textarea(['rows' => 1]) ?>                </div>
                <div class="form-group">

                </div>

                <div class="form-group">

                </div>

            </div>
            <!-- /.box-body -->

        </div>

        <div class="box box-warning ">
            <div class="box-header with-border">
                <h3 class="box-title"> تنظیمات</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'slide')->radioList([1 => 'ویژه', 0 => 'عادی'])->label('نوع خبر'); ?>
                </div>
                    <br><br><br><br><br><br>
                <div class="form-group">
                    <?= $form->field($model, 'viewtype')->radioList([1 => ' بزرگ', 0 => ' کوچک'])->label('نحوه نمایش لوگوی خبر'); ?>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'view_fm')->
                    radioList([2 => 'آیکون فیلم',1 => 'آیکون موسیقی', 0 => 'متن'])->
                    label('نوع آیکون لوگوی خبر'); ?>
                </div>
                </div>
                            </div>
        </div>

    </div>

    <div class="col-md-12">
    <div align="center">
        <div class="form-group">
            <?= Html::submitButton('مرحله بعد', ['class' => 'btn btn-success btn-lg']) ?>
        </div>
    </div>
    </div>

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
