<?php


use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$title='کارکرد اپراتور از '.$startdate.'  تا '.$enddate;
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

    <div align="center">
        <?php ActiveForm::begin(['action' => ['operator-master/index'], 'options' => ['method' => 'post', 'data-pjax' => '']]); ?>
        <?php echo Html::submitButton('برگشت', ['class' => 'btn btn-info']); ?>
        <input type="hidden"   name="sdate" id="startDate" value="<?php echo $startdate?>">
        <input type="hidden"   id="endDate" value="<?php echo $enddate?>">
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

