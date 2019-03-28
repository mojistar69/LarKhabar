<?php
use yii\grid\GridView;
$this->title = 'سامانه 118';
echo GridView::widget(['dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'columns'=>[
        [
            'class' => 'yii\grid\CheckboxColumn',
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



    ],])


?>
<a href="<?= Yii::$app->homeUrl ?>?r=operator-master-report">
<button type="button" class="btn btn-block btn-success btn-lg">گزارش</button>
</a>