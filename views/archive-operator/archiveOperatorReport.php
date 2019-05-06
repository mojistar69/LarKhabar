<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;


$title='گزارش آرشیو اپراتور از '.$startdate.'  تا '.$enddate;
$gridColumns = [
    [
        'attribute'=>'cname',
        'value'=>'cname',
        'label'=>'نام شهر'
    ],


    [
        'attribute'=>'rcvcall',
        'value'=>'rcvcall',
        'label'=>'تماس های دریافتی'
    ],

    [
        'attribute' => Yii::t('app', 'زمان خروج'),
        'format' => 'raw',
        'value' => function ($searchModel) {
            $date = new DateTime($searchModel['logoffdatetime']);
            return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
        },
    ],


    [
        'attribute' => Yii::t('app', 'زمان ورود'),
        'format' => 'raw',
        'value' => function ($searchModel) {
            $date = new DateTime($searchModel['logindatetime']);
            return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
        },
    ],


    [
        'attribute'=>'family',
        'value'=>'family',
        'label'=>'نام خانوادگی'
    ],


    [
        'attribute'=>'opname',
        'value'=>'opname',
        'label'=>'نام اپراتور'
    ],


    [
        'attribute'=>'opnumber',
        'value'=>'opnumber',
        'label'=>'شماره اپراتور'
    ],


];
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo $title ?></h3>
        <!-- tools box -->
        <div class="pull-left box-tools">
            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                    class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /. tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding bg-info">
        <?php
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
        ]);
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
                        $date = new DateTime($searchModel['logindatetime']);
                        return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                    },
                ],

                [
                    'attribute' => Yii::t('app', 'زمان خروج'),
                    'format' => 'raw',
                    'value' => function ($searchModel) {
                        $date = new DateTime($searchModel['logoffdatetime']);
                        return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                    },
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
    </div>
    <div align="center">
        <?php ActiveForm::begin(['action' => ['archive-operator/index'], 'options' => ['method' => 'post', 'data-pjax' => '']]); ?>
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
