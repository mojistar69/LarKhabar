<?php

use app\models\Gorooh;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Didgah */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger ">
            <div class="box-header with-border">
                <h3 class="box-title">اطلاعات دیدگاه</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'g_id')->textarea(['rows' => 1,'maxlength' => 90,'style'=>'width:200px',
                        'placeholder'=>'شناسه خبر']) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'name')->textarea(['rows' => 1,'maxlength' => 90,'style'=>'width:200px',
                        'placeholder'=>'دیدگاه توسط']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'email')->textarea(['rows' => 2,'maxlength' => 240,'style'=>'width:400px',
                        'placeholder'=>'پست الکترونیک']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'matn')->textarea(['rows' => 6,'maxlength' => 240,'style'=>'width:400px',
                        'placeholder'=>'متن']) ?>
                </div>

                <?= $form->field($model, 'taeed')->checkbox(); ?>

                <div class="form-group">
                    <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>