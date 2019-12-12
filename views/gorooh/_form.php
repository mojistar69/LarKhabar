<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
    <div class="col-md-6">
        <div class="box box-danger ">
            <div class="box-header with-border">
                <h3 class="box-title">اطلاعات گروه</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'onvan')->textarea(['rows' => 1,'maxlength' => 90,'style'=>'width:200px',
                        'placeholder'=>'عنوان گروه']) ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'musicFile1')->fileInput()->label('عکس کوچک') ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

        </div>
    </div>
</div>
