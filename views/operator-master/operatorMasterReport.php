<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
$title='کارکرد اپراتور از '.$startdate.'  تا '.$enddate;
$this->params['breadcrumbs'][] = ['label' => 'کارکرد اپراتور ', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'گزارش دهی';
$gridColumns = [
[
        'attribute'=>'under10Byop',
    'width'=>'5px',
    'vAlign'=>'middle',
        'label'=>'قطع زیر 10  ثانیه از طرف اپراتور'
    ],

    [
        'attribute'=>'under10Bycu',
        'label'=>'قطع زیر 10  ثانیه از طرف مشترک'
    ],

    [ 'attribute'=>'mechanized',
        'label'=>'اعلام نتایج'
    ],

    [
        'attribute'=>'cutfromcustomer',
        'label'=>'قطع از طرف مشترک'
    ]
    ,[
        'attribute'=>'family',
        'label'=>'نام خانوادگی'
    ],
    [ 'attribute'=>'name',
        'label'=>'نام'
    ],
    [
        'attribute'=>'opid',
        'label'=>'اپراتور',
        'vAlign'=>'middle',
        'width'=>'10px'
    ]

];
?>
<div class="box">
    <div class="box-header bg-success">
        <h3 class="box-title text-info"><?php echo $title ?></h3>
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
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
        ]);
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
                    'label'=>'اعلام نتایج'
                ],[
                    'attribute'=>'under10Bycu',
                    'label'=>'قطع زیر 10  ثانیه از طرف مشتری'
                ],[
                    'attribute'=>'under10Byop',
                    'label'=>'قطع زیر 10  ثانیه از طرف اپراتور'
                ],

            ],])
        ?>
    </div>

    <div align="center">
        <?php ActiveForm::begin(['action' => ['operator-master/grid'], 'method' => 'get']); ?>
        <?php echo Html::submitButton('برگشت', ['class' => 'btn btn-info']); ?>
        <input type="hidden"   name="startDate" id="startDate" value="<?php echo $startdate?>">
        <input type="hidden"   name="endDate" id="endDate" value="<?php echo $enddate?>">
        <input type="hidden"   id="selection" value="<?php echo $selection_array?>">
        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.box-body -->
</div>
<script>
    $( document ).ready(function() {
        var params='&startDate='+$("#startDate").val()+'&endDate='+$("#endDate").val()+
            '&selection='+$("#selection").val();
        $(".pagination li").each(function(){
            if($(this).find('a').attr('href'))
                $(this).find('a').attr('href',$(this).find('a').attr('href')+params);
        });
    });
</script>


