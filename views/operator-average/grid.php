<?php
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
ActiveForm::begin(['action'=>['operator-average/selected'],'options'=>['method'=>'post']]);
?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">میانگین عملکرد اپراتور</h3>
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
            'filterModel'=>$searchModel,
            'summary' => '',
            'columns'=>[
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'checkboxOptions' => function($model, $key, $index, $widget) {
                        return ['value' => $model['opnumber'] ];
                    },
                ],

                [
                    'attribute'=>'opnumber',
                    'label'=>'اپراتور'
                ],

                [
                    'attribute'=>'name',
                    'value'=>'name',
                    'label'=>'نام'
                ],

                [
                    'attribute'=>'family',
                    'value'=>'family',
                    'label'=>' نام خانوادگی اپراتور'
                ],

            ],])
        ?>
    </div>
    <!-- /.box-body -->
</div>
<?= Html::submitButton('گزارش', ['class' => 'btn btn-primary']);?>
<?php ActiveForm::end(); ?>

