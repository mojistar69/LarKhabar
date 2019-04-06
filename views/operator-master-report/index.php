<?php
use yii\grid\GridView;
echo GridView::widget(['dataProvider'=>$dataProvider,

    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '0'],
    'summary' => '',
    'columns'=>[

        [
            'attribute'=>'opid',
            'label'=>'اپراتور'
        ],[ 'attribute'=>'name',
            'label'=>'نام'
        ],[
            'attribute'=>'family',
            'label'=>'نام خانوادگی'
        ],

        [
            'attribute'=>'cutfromcustomer',
            'label'=>'قطع از طرف مشترک'
        ],[ 'attribute'=>'mechanized',
            'label'=>'مکانیزه'
        ],[
            'attribute'=>'under10Bycu',
            'label'=>'زیر 10 از طرف مشتری'
        ],[
            'attribute'=>'under10Byop',
            'label'=>'زیر 10 از طرف اپراتور'
        ],

    ],])
?>


