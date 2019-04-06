<?php
use yii\grid\GridView;
echo GridView::widget(['dataProvider'=>$dataProvider,
    'summary' => '',
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '0'],
    'columns'=>[
        [
            'attribute'=>'opnumber',
            'value'=>'opnumber',
            'label'=>'شماره اپراتور'
        ],
        [
            'attribute'=>'opname',
            'value'=>'opname',
            'label'=>'نام اپراتور'
        ],
        [
            'attribute'=>'family',
            'value'=>'family',
            'label'=>'نام خانوادگی'
        ],

        [
            'attribute'=>'logindatetime',
            'value'=>'logindatetime',
            'label'=>'زمان ورود'
        ],

        [
            'attribute'=>'logoffdatetime',
            'value'=>'logoffdatetime',
            'label'=>'زمان خروج'
        ],

        [
            'attribute'=>'rcvcall',
            'value'=>'rcvcall',
            'label'=>'تماس های دریافتی'
        ],
        [
            'attribute'=>'cname',
            'value'=>'cname',
            'label'=>'نام شهر'
        ],


    ],])
?>