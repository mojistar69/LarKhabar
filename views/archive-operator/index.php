<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use yii\widgets\Pjax;

AppAsset::register($this);
?>

<div class="row">
    <div class="box">
        <div class="box-header bg-purple-gradient">
            <h3 class="box-title"> آرشیو اپراتور</h3>
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body ">
            <div class="container" style="max-width: 500px;">
                <?php ActiveForm::begin(['action' => ['archive-operator/grid'], 'options' => ['method' => 'post', 'data-pjax' => '']]); ?>
                <div class="form-group">
                    <div class="input-group">
                        <label for="startDate">از تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                             data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true"
                             data-enabletimepicker="false" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'startDate', 'id' => 'startDate', 'value' => $startDatetime]) ?>
                    </div>

                    <div class="input-group">
                        <label for="endDate">تا تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                             data-targetselector="#toDate1" data-groupid="group1" data-todate="true"
                             data-enabletimepicker="true" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'endDate', 'id' => 'endDate', 'value' => $endDatetime]) ?>
                    </div>
                </div>
                <div class="form-group" align="center">
                    <?= Html::submitButton(Yii::t('app', 'جستجو'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
            <?php
            if (isset($dataProvider)) {
                ActiveForm::begin(['action' => ['archive-operator/selected'], 'options' => ['method' => 'post']]);
                ?>
                <div class="form-group" align="center">
                    <input type="hidden"   name="sdate" value="<?php echo $startDatetime?>">
                    <input type="hidden"   name="edate" value="<?php echo $endDatetime?>">
                    <?php echo Html::submitButton('گزارش', ['class' => 'btn btn-info']); ?>
                </div>
                <?php

                echo GridView::widget(['dataProvider' => $dataProvider,
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

                        [
                            'attribute'=>'logcount',
                            'label'=>' تعداد خروج'
                        ],


                        [
                            'attribute'=>'anscall',
                            'label'=>'قطع از طرف اپراتور'
                        ],
                        [
                            'attribute'=>'rcvcall',
                            'label'=>'دریافتی بومی'
                        ],

                        [
                            'attribute' => Yii::t('app', 'تاریخ'),
                            'format' => 'raw',
                            'value' => function ($searchModel) {
                                $date = new DateTime($searchModel['logindatetime']);
                                return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                            },
                        ],

                    ]
                ]);

                ActiveForm::end();
            }
            ?>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        var date='&startDate='+$("#startDate").val()+'&endDate='+$("#endDate").val();
        $(".pagination li").each(function(){
            if($(this).find('a').attr('href'))
                $(this).find('a').attr('href',$(this).find('a').attr('href')+date);
        });
    });
</script>
