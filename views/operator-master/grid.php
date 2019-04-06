<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'سامانه 118';
ActiveForm::begin(['action'=>['operator-master/selected'],'options'=>['method'=>'post']]);
echo GridView::widget(['dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'summary' => '',
    'columns'=>[
        [
            'class' => 'yii\grid\CheckboxColumn',
            ],

        [
            'attribute'=>'calluid',
            'label'=>'شماره تماس'
        ],
        [
            'attribute'=>'opid',
            'label'=>'شماره اپراتور'
        ],
        [
        'attribute'=>'name',
        'value'=>'operator.name',
        'label'=>'نام'
    ],

        [
            'attribute'=>'family',
            'value'=>'operator.family',
            'label'=>' نام خانوادگی اپراتور'
        ],

        [
            'attribute'=>'startdatetime',
            'label'=>'تاریخ تماس'
        ],



    ],
    ])


?>
<?=Html::submitButton('گزارش', ['class' => 'btn btn-primary']);?>
<?php ActiveForm::end(); ?>
