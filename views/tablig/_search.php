<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TabligSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tablig-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'g_id') ?>

    <?= $form->field($model, 'url_list') ?>

    <?= $form->field($model, 'url_info') ?>

    <?= $form->field($model, 'url_link') ?>

    <?php // echo $form->field($model, 'url_list_d') ?>

    <?php // echo $form->field($model, 'url_info_d') ?>

    <?php // echo $form->field($model, 'url_link_d') ?>

    <?php // echo $form->field($model, 'tarikh_start') ?>

    <?php // echo $form->field($model, 'tarikh_end') ?>

    <?php // echo $form->field($model, 'taeed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
