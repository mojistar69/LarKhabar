<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use kartik\file\FileInput;
use yii\helpers\Url;
$gridColumns = [
    [
        'attribute' => 'family',
        'value' => 'family',
        'headerOptions' => ['width' => '80'],
        'label' => ' نام خانوادگی اپراتور'
    ],
    [
        'attribute' => 'name',
        'value' => 'name',
        'label' => 'نام'
    ],

    [
        'attribute' => 'opid',
        'label' => 'شماره اپراتور'
    ],
    [
        'attribute' => 'calluid',
        'label' => 'calluid',
        'label' => 'شماره تماس',
    ],
];

AppAsset::register($this);

$form = ActiveForm::begin();
echo $form->field($model, 'avatar[]')->widget(FileInput::classname(), [
    'options' => ['multiple' => true, 'accept' => 'image/*'],
    'pluginOptions' => ['previewFileType' => 'image']
]);
$form = ActiveForm::end();
?>




