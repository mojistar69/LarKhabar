<?php
use yii\grid\GridView;
?>
<div class="box">
    <div class="box-header bg-success">
        <h3 class="box-title text-info">گزارش کارکرد اپراتور</h3>
        <!-- tools box -->
        <div class="pull-left box-tools">
            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                    class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding bg-info ">
        <?php
        echo GridView::widget(['dataProvider'=>$dataProvider,
            'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'ندارد'],
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
    </div>
    <!-- /.box-body -->
</div>



