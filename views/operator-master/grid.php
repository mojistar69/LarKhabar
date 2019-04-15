<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'سامانه 118';

?>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">کارکرد اپراتور</h3>
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
        ActiveForm::begin(['action'=>['operator-master/selected'],'options'=>['method'=>'post']]);
        echo GridView::widget(['dataProvider'=>$dataProvider,
//            'filterModel'=>$searchModel,
            'summary' => '',
            'columns'=>[
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'checkboxOptions' => function($model, $key, $index, $widget) {
                        return ['value' => $model['opnumber'] ];
                    },
                ],

                [
                    'attribute'=>'calluid',
                    'label'=>'شماره تماس'
                ],
                [
                    'attribute'=>'opid',
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
                    'label'=>' نام خانوادگی اپراتور'
                ],

                [
                    'attribute' => 'تاریخ',
                    'format' => 'raw',
                    'value' => function ($searchModel) {
                        $date = new DateTime($searchModel['startdatetime']);
                        return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                    },
                ],
            ],
        ])
        ?>
    </div>
    <!-- /.box-body -->
</div>

<?= Html::submitButton('گزارش', ['class' => 'btn btn-primary']);?>
<?php ActiveForm::end(); ?>