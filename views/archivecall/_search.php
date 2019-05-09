<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArchivecallSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="archivecall-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'calluid') ?>

    <?= $form->field($model, 'lastcallid') ?>

    <?= $form->field($model, 'operatorchain') ?>

    <?= $form->field($model, 'startdatetime') ?>

    <?= $form->field($model, 'enddatetime') ?>

    <?php // echo $form->field($model, 'calllaststate') ?>

    <?php // echo $form->field($model, 'callerid') ?>

    <?php // echo $form->field($model, 'cityid') ?>

    <?php // echo $form->field($model, 'zoneid') ?>

    <?php // echo $form->field($model, 'talktime') ?>

    <?php // echo $form->field($model, 'opnumber') ?>

    <?php // echo $form->field($model, 'opid') ?>

    <?php // echo $form->field($model, 'serverid') ?>

    <?php // echo $form->field($model, 'callednumber') ?>

    <?php // echo $form->field($model, 'channel') ?>

    <?php // echo $form->field($model, 'record') ?>

    <?php // echo $form->field($model, 'responses') ?>

    <?php // echo $form->field($model, 'service') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
