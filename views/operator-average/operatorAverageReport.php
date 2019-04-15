<?php
use yii\grid\GridView;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">گزارش میانگین عملکرد اپراتور</h3>
        <!-- tools box -->
        <div class="pull-left box-tools">
            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                    class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
         <?php
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
                'attribute'=>'name',
                'value'=>'name',
                'label'=>'نام'
            ],
            [
                'attribute'=>'family',
                'value'=>'family',
                'label'=>'نام خانوادگی'
            ],
            [
                'attribute'=>'all',
                'value'=>'all',
                'label'=>'تعداد مکالمات'
            ],
                [
                    'attribute' => Yii::t('app', 'مدت زمان کل'),
                    'format' => 'raw',
                    'value' => function ($model) {
                        $sum=$model['total'];
                        $h=(int)($sum/3600);
                        $m=(int)(($sum%3600)/60);
                        $s=(int)($sum%60);
                        return ''.$h.':'.$m.':'.$s;
                             },
                ],
            [
                'attribute'=>'oral',
                'value'=>'oral',
                'label'=>'پاسخ شفاهی'
            ],

            [
                'attribute'=>'unrelated',
                'value'=>'unrelated',
                'label'=>'سوال غیر مرتبط'
            ],
            [
                'attribute'=>'noinfo',
                'value'=>'noinfo',
                'label'=>'اعلام عدم موجود بودن شماره'
            ],
            [
                'attribute'=>'disturber',
                'value'=>'disturber',
                'label'=>'معرفی مزاحم'
            ],
        ],])
         ?>
    </div>
    <!-- /.box-body -->
</div>

