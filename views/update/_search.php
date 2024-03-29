<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UpdateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="update-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'desc') ?>

    <?= $form->field($model, 'imgurl') ?>

    <?= $form->field($model, 'titlenew') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'linkdown') ?>

    <?php // echo $form->field($model, 'checkdown') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
