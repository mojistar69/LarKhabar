<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KhabarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khabar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lid') ?>

    <?= $form->field($model, 'gorooh') ?>

    <?= $form->field($model, 'titr') ?>

    <?= $form->field($model, 'roo_titr') ?>

    <?php // echo $form->field($model, 'matn') ?>

    <?php // echo $form->field($model, 'ax_k') ?>

    <?php // echo $form->field($model, 'ax_b') ?>

    <?php // echo $form->field($model, 'tarikh') ?>

    <?php // echo $form->field($model, 'manba') ?>

    <?php // echo $form->field($model, 'film') ?>

    <?php // echo $form->field($model, 'film_aparat') ?>

    <?php // echo $form->field($model, 'film_onvan') ?>

    <?php // echo $form->field($model, 'slide') ?>

    <?php // echo $form->field($model, 'taeed') ?>

    <?php // echo $form->field($model, 'view') ?>

    <?php // echo $form->field($model, 'viewtype') ?>

    <?php // echo $form->field($model, 'view_fm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
