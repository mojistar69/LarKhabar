<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CurrentoperatorsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currentoperators-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'opid') ?>

    <?= $form->field($model, 'currentcallid') ?>

    <?= $form->field($model, 'currentcalluid') ?>

    <?= $form->field($model, 'lastchoosedatetime') ?>

    <?php // echo $form->field($model, 'rcvcall') ?>

    <?php // echo $form->field($model, 'anscall') ?>

    <?php // echo $form->field($model, 'nanscalls') ?>

    <?php // echo $form->field($model, 'opnumber') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'cityId') ?>

    <?php // echo $form->field($model, 'callcityId') ?>

    <?php // echo $form->field($model, 'localmac') ?>

    <?php // echo $form->field($model, 'localport') ?>

    <?php // echo $form->field($model, 'logindatetime') ?>

    <?php // echo $form->field($model, 'logoffdatetime') ?>

    <?php // echo $form->field($model, 'lastAlive') ?>

    <?php // echo $form->field($model, 'operatorrequest') ?>

    <?php // echo $form->field($model, 'systemrequest') ?>

    <?php // echo $form->field($model, 'supervisorconfirm') ?>

    <?php // echo $form->field($model, 'showcallerid') ?>

    <?php // echo $form->field($model, 'operatorstate') ?>

    <?php // echo $form->field($model, 'endcall7') ?>

    <?php // echo $form->field($model, 'endcall8') ?>

    <?php // echo $form->field($model, 'endcall9') ?>

    <?php // echo $form->field($model, 'endcall11') ?>

    <?php // echo $form->field($model, 'supervisorrequest') ?>

    <?php // echo $form->field($model, 'lihost') ?>

    <?php // echo $form->field($model, 'liport') ?>

    <?php // echo $form->field($model, 'serviceenabled') ?>

    <?php // echo $form->field($model, 'showstatistics') ?>

    <?php // echo $form->field($model, 'operationtype') ?>

    <?php // echo $form->field($model, 'rcvspecial') ?>

    <?php // echo $form->field($model, 'ansspecial') ?>

    <?php // echo $form->field($model, 'localip') ?>

    <?php // echo $form->field($model, 'token') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
