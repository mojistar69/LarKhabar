<?php

use jDate\DatePicker;
use yii\grid\GridView;
use yii\helpers\Html;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use kartik\export\ExportMenu;
$this->title = 'آمار درخواست ها';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [
    [
        'attribute' => 'cnt',
        'value' => 'cnt',
        'label' => 'تعداد'
    ],
    [
        'attribute' => 'telnumber',
        'value' => 'telnumber',
        'label' => 'شماره تلفن'
    ],


];
AppAsset::register($this);
?>

<div class="row">
    <div class="box">
        <div class="box-header bg-orange-active">
            <h3 class="box-title"> آمار درخواست ها</h3>
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body  bg-gray-light text-black">
            <div class="container" style="max-width: 500px;">
                <div class="form-group">
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
                    <div class="input-group" >
                        <label for="phonenumber">شمارها  </label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                             data-targetselector="#toDate1" data-groupid="group1" data-todate="true"
                             data-enabletimepicker="true" data-placement="left">
                            <span class="glyphicon glyphicon-phone"></span>
                        </div>
                        <input type="text" id="phonenumber" name="phonenumber" placeholder="شماره تلفن" value="" >
                    </div>
                <div class="form-group" align="center">
                    <button id="searchbtn" class="btn btn-warning btn-lg">جستجو <i class="fa fa-search"></i></button>
                </div>
            </div>
            <?php
            if (isset($dataProvider)) {
            ?>
            <div class="form-group" align="center">
                <input type="hidden" id="startDate" name="startDate" value="<?php echo $startDatetime ?>">
                <input type="hidden" id="endDate" name="endDate" value="<?php echo $endDatetime ?>">

            </div>
        </div>
        <?php
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
        ]);
        echo GridView::widget(['dataProvider' => $dataProvider,
            'summary' => '',
            'columns' => [

                [
                    'attribute' => 'telnumber',
                    'value' => 'telnumber',
                    'label' => 'شماره تلفن'
                ],

                [
                    'attribute' => 'cnt',
                    'value' => 'cnt',
                    'label' => 'تعداد'
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
<script type="text/javascript"></script>

<script type="text/javascript">
    $("#searchbtn").click(function () {
        var start = $("#startDate").val()
        var end = $("#endDate").val()
        var zoneId=$('#zoneId').val();
        var phoneNumber=$('#phonenumber').val();
        var email = /^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/;
        if (email.test(start) && email.test(end)) {
            var start_num = start.substring(0, 4) + start.substring(5, 7) + start.substring(8, 10);
            var end_num = end.substring(0, 4) + end.substring(5, 7) + end.substring(8, 10);
            if (parseInt(end_num) > parseInt(start_num)) {
                var url2 = "<?= Yii::$app->homeUrl ?>?r=requested-number/grid&startDate=" + start
                    + "&endDate=" + end+ "&zoneId=" + zoneId+ "&phonenumber=" + phoneNumber;
                window.location = url2;
            }

            else {
                alert("تاریخ شروع بزرگتر از تاریخ پایان است!")
            }
        }
        else {
            alert("فرمت تاریخ وارد شده صحیح نیست")
        }
    });
</script>
