<?php
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

ActiveForm::begin(['action'=>['archive-operator/selected'],'options'=>['method'=>'post']]);
echo GridView::widget(['dataProvider'=>$dataProvider,
    'summary' => '',
    'columns'=>[
        [
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions' => function($model, $key, $index, $widget) {
                return ['value' => $model['opnumber'] ];
            },
        ],

        [
            'attribute'=>'opnumber',
            'label'=>'اپراتور'
        ],

        [
            'attribute'=>'name',
            'value'=>'name',
            'label'=>'نام'
        ],

        [
            'attribute'=>'family',
            'value'=>'family',
            'label'=>' نام خانوادگی اپراتور'
        ],

        [
            'attribute'=>'logcount',
            'label'=>' تعداد خروج'
        ],


        [
            'attribute'=>'anscall',
            'label'=>'قطع از طرف اپراتور'
        ],
        [
            'attribute'=>'rcvcall',
            'label'=>'دریافتی بومی'
        ],




    ],])
?>
<?= Html::submitButton('گزارش', ['class' => 'btn btn-primary']);?>
<?php ActiveForm::end(); ?>
