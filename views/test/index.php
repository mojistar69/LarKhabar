<?php
use app\assets\AppAsset;
use kartik\export\ExportMenu;
use kartik\grid\GridView;


AppAsset::register($this);


$gridColumns = [
    [
        'attribute'=>'cname',
        'value'=>'cname',
        'label'=>'نام شهر'
    ],


    [
        'attribute'=>'rcvcall',
        'value'=>'rcvcall',
        'label'=>'تماس های دریافتی'
    ],

    [
        'attribute' => Yii::t('app', 'زمان خروج'),
        'format' => 'raw',
        'value' => function ($searchModel) {
            $date = new DateTime($searchModel['logoffdatetime']);
            return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
        },
    ],


    [
        'attribute' => Yii::t('app', 'زمان ورود'),
        'format' => 'raw',
        'value' => function ($searchModel) {
            $date = new DateTime($searchModel['logindatetime']);
            return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
        },
    ],


    [
        'attribute'=>'family',
        'value'=>'family',
        'label'=>'نام خانوادگی'
    ],


    [
        'attribute'=>'opname',
        'value'=>'opname',
        'label'=>'نام اپراتور'
    ],


    [
        'attribute'=>'opnumber',
        'value'=>'opnumber',
        'label'=>'شماره اپراتور'
    ],


];
$stoday=date("Y/m/d").' 00:00:00';
$stomorrow=date("Y/m/d").' 23:59:59';
var_dump($stomorrow);
//echo ExportMenu::widget([
//    'dataProvider' => $dataProvider,
//    'columns' => $gridColumns,
//]);

