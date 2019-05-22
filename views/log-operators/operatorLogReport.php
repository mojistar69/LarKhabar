<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
$title='کارکرد اپراتور از '.$startdate.'  تا '.$enddate;
$this->params['breadcrumbs'][] = ['label' => 'کارکرد اپراتور ', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'گزارش دهی';
$gridColumns = [

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
                    'label'=>'شماره اپراتور '
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

            ],])
        ?>
    </div>

    <div align="center">
        <?php ActiveForm::begin(['action' => ['log-operators/grid'], 'method' => 'get']); ?>
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


