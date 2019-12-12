<?php

use app\models\Gorooh;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Khabar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khabar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lid')->textarea(['rows' => 1]) ?>

    <?php
    $items = ArrayHelper::map(Gorooh::find()->all(), 'id', 'onvan');
    ?>

    <?=$form->field($model, 'gorooh')->dropDownList($items)
    ?>

    <?= $form->field($model, 'titr')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'roo_titr')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'matn')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'musicFile1')->fileInput()->label('عکس کوچک') ?>

    <?= $form->field($model, 'musicFile2')->fileInput()->label('عکس بزرگ') ?>

    <?= $form->field($model, 'manba')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'film')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'film_aparat')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'film_onvan')->textarea(['rows' => 1]) ?>


    <?= $form->field($model, 'slide')->radioList([1 => 'ویژه', 0 => 'عادی'])->label('نوع خبر'); ?>
    <?= $form->field($model, 'viewtype')->radioList([1 => ' بزرگ', 0 => ' کوچک'])->label('نحوه نمایش لوگوی خبر'); ?>
    <?= $form->field($model, 'view_fm')->radioList([2 => 'متن',1 => 'صوت', 0 => 'ویدئو'])->label('نوع آیکون لوگوی خبر'); ?>

    <?= $form->field($model, 'taeed')->checkbox(); ?>
    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
