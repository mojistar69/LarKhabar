<?php
use yii\grid\GridView;
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">گزارش جزئیات عملکرد اپراتور</h3>
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
                'attribute' => Yii::t('app', 'زمان ورود'),
                'format' => 'raw',
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['startdatetime']);
                    return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                },
            ],

        [
        'attribute'=>'talktime',
        'value'=>'talktime',
        'label'=>'مدت تماس (ثانیه)'
        ],
        [
        'attribute'=>'callerid',
        'value'=>'callerid',
        'label'=>'تماس گیرنده'
        ],
        [
        'attribute'=>'state',
        'value'=>'state',
        'label'=>'حالت تماس'
        ],
        ],])
         ?>
    </div>
    <!-- /.box-body -->
</div>

