<?php

use yii\grid\GridView;
use yii\helpers\Html;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use kartik\export\ExportMenu;
$this->title = 'آرشیو اپراتورها';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [

    [
        'attribute' => 'cname',
        'value' => 'city.name',
        'label' => ' نام شهر'
    ],
    [
        'attribute' => 'ofamily',
        'value' => 'operator.family',
        'headerOptions' => ['width' => '80'],
        'label' => ' نام خانوادگی اپراتور'
    ],
    [
        'attribute' => 'oname',
        'value' => 'operator.name',
        'label' => 'نام اپراتور'
    ],

    [
        'attribute' => 'oopid',
        'label' => 'شماره اپراتور',
        'value' => 'operator.opid'
    ],

    ['class' => 'yii\grid\SerialColumn'],
];

AppAsset::register($this);
?>

<div class="row">
    <div class="box">
        <div class="box-header bg-purple-gradient">
            <h3 class="box-title"> آرشیو اپراتور ها</h3>
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body ">
            <div class="container" style="max-width: 500px;">
                <div class="row">
                    <div class="form-group col-md-8" >
                        <div class="input-group">
                            <label for="startDate">از تاریخ</label>
                            <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                                 data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true"
                                 data-enabletimepicker="false" data-placement="left">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </div>
                            <?= jDate\DatePicker::widget(['name' => 'startDate', 'id' => 'startDate',
                                'value' => $startDatetime]) ?>
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
                    <div class="form-group col-md-4" >
                        <?= Html::submitButton(Yii::t('app', 'جستجو'), ['class' => 'btn btn-warning'
                            , 'id' => 'searchbtn']) ?>
                        <?php
                        if (isset($dataProvider)) {
                        ?>
                        <div class="form-group" align="center">
                            <div class="modal fade" id="noSelected" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">کاربر گرامی</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>موردی جهت گزارش گیری انتخاب نشده است!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="startDate" name="startDate" value="<?php echo $startDatetime ?>">
                        <input type="hidden" id="endDate"  name="endDate" value="<?php echo $endDatetime ?>">
                        <?php echo Html::submitButton('گزارش', ['class' => 'btn btn-info','id'=>'report']); ?>
                    </div>
                </div>
            </div>
            <?php
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
            ]);
            echo  GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [

                    [
                        'class' => 'yii\grid\CheckboxColumn',
                        'checkboxOptions' => function($model, $key, $index, $widget) {
                            return ['value' => $model['opnumber'] ];
                        },
                    ],
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'oopid',
                        'label' => 'شماره اپراتور',
                        'value' => 'operator.opid'
                    ],
                    [
                        'attribute' => 'oname',
                        'value' => 'operator.name',
                        'label' => 'نام اپراتور'
                    ],
                    [
                        'attribute' => 'ofamily',
                        'value' => 'operator.family',
                        'headerOptions' => ['width' => '80'],
                        'label' => ' نام خانوادگی اپراتور'
                    ],

                    [
                        'attribute' => 'cname',
                        'value' => 'city.name',
                        'label' => ' نام شهر'
                    ],


                ],
            ]);

            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var date = '&startDate=' + $("#startDate").val() + '&endDate=' + $("#endDate").val();
        $(".pagination li").each(function () {
            if ($(this).find('a').attr('href'))
                $(this).find('a').attr('href', $(this).find('a').attr('href') + date);
        });
    });
</script>

<script type="text/javascript">
    $( "#report" ).click(function() {
        if($('td > input[type=checkbox]:checked').length == 0) {
            $("#noSelected").modal('show');
        }

        else{
            var start=$('#startDate').val();
            var end=$('#endDate').val();
            var str=0;
            var array=$('td > input[type=checkbox]:checked').map(function()
            {
                return $(this).val();
            }).get();
            var url = "<?= Yii::$app->homeUrl ?>?r=archive-operator/selected&startDate="+start
                +"&endDate="+end+"&selection="+array;
            window.location = url;
        }

    });
</script>
<script type="text/javascript">
    $( "#searchbtn" ).click(function() {
        var start = $( "#startDate" ).val()
        var end = $( "#endDate" ).val()
        var email = /^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/;
        if (email.test(start) && email.test(end) ) {
            var start_num=start.substring(0,4)+start.substring(5,7)+start.substring(8,10);
            var end_num=end.substring(0,4)+end.substring(5,7)+end.substring(8,10);
            if(parseInt(end_num)>parseInt(start_num)){
                var url2 = "<?= Yii::$app->homeUrl ?>?r=archive-operator/grid&startDate="+start
                    +"&endDate="+end;
                window.location = url2;
            }

            else{
                alert("تاریخ شروع بزرگتر از تاریخ پایان است!")
            }
        }
        else {
            alert("فرمت تاریخ وارد شده صحیح نیست")
        }
    });
</script>
