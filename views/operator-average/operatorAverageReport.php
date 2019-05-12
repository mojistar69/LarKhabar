<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
$title='گزارش میانگین عملکرد اپراتور'.$startdate.'  تا '.$enddate;
$this->params['breadcrumbs'][] = ['label' => 'میانگین عملکرد اپراتور ', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'گزارش دهی';
$gridColumns = [
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
        'attribute'=>'all',
        'value'=>'all',
        'label'=>'تعداد مکالمات'
    ],
    [
        'attribute'=>'disturber',
        'value'=>'disturber',
        'label'=>'معرفی مزاحم'
    ],
    [
        'attribute'=>'noinfo',
        'value'=>'noinfo',
        'label'=>'اعلام عدم موجود بودن شماره'
    ],

    [
        'attribute'=>'unrelated',
        'value'=>'unrelated',
        'label'=>'سوال غیر مرتبط'
    ],

    [
        'attribute'=>'oral',
        'value'=>'oral',
        'label'=>'پاسخ شفاهی'
    ],

    [
        'attribute'=>'family',
        'value'=>'family',
        'label'=>'نام خانوادگی'
    ],
    [
        'attribute'=>'name',
        'value'=>'name',
        'label'=>'نام'
    ],
    [
        'attribute'=>'opnumber',
        'value'=>'opnumber',
        'label'=>'شماره اپراتور'
    ],
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
            ]
            ,])
        ?>
    </div>

    <div align="center">
        <?php ActiveForm::begin(['action' => ['operator-average/index'], 'options' => ['method' => 'post', 'data-pjax' => '']]); ?>
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

