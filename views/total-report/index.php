<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
$this->title = 'آمار کلی تماس ها';
$this->params['breadcrumbs'][] = $this->title;

AppAsset::register($this);

?>


<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header bg-orange-active">
            <h3 class="box-title"> آمار کلی تماس ها</h3>
            <!-- tools box -->
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body bg-gray-light text-black">
            <!--/////////////////////////////////////////////////-->
            <div class="container" style="max-width: 500px;">
                <div class="form-group">
                    <div class="input-group">
                        <label for="startDate">از تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true" data-enabletimepicker="false" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'startDate', 'id' => 'startDate', 'value' => $startDatetime]) ?>
                    </div>

                    <div class="input-group">
                        <label for="endDate">تا تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#toDate1" data-groupid="group1" data-todate="true" data-enabletimepicker="true" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'endDate', 'id' => 'endDate', 'value' => $endDatetime]) ?>
                    </div>
                </div>

                <div class="form-group" align="center">
                    <button id="searchbtn" class="btn btn-warning btn-lg">جستجو <i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> </h3>
            <!-- tools box -->
            <div class="pull-left box-tools">

            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><span name="channelNumber"> <?php echo $Parameter[0] ?> </span></h3>
                            <p>کل تماس های وارده</p>
                        </div>
                        <div class="icon">
                            <i class="ion-ios-barcode"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><span name="entranceCall"> <?php echo $Parameter[1] ?> </span></h3>
                            <p>تماس های وصل شده به اپراتور</p>
                        </div>
                        <div class="icon">
                            <i class="ion-log-in"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><span name="WaitingQueue"> <?php echo $Parameter[2] ?> </span></h3>
                            <p>پاسخ داده شده توسط سیستم</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-contacts"></i>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->

                    <div class="small-box bg-green-gradient">
                        <div class="inner">
                            <h3><span name="listiningResult"> <?php echo $Parameter[4] ?> </span></h3>
                            <p>پاسخ داده شده شفاهی</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-volume-up"></i>
                        </div>
                    </div>


                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->

                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><span name="listiningResult"> <?php echo $Parameter[5] ?> </span></h3>
                            <p>میانگین زمان مکالمه (ثانیه)</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-volume-up"></i>
                        </div>
                    </div>


                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /.col -->
    <!-- /.box -->

    <!-- /.box -->
    <!-- /.col -->
</div>

<script type="text/javascript">
    $( "#searchbtn" ).click(function() {
        var start = $( "#startDate" ).val()
        var end = $( "#endDate" ).val()
        var email = /^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/;
        if (email.test(start) && email.test(end) ) {
            var start_num=start.substring(0,4)+start.substring(5,7)+start.substring(8,10);
            var end_num=end.substring(0,4)+end.substring(5,7)+end.substring(8,10);
            if(parseInt(end_num)>parseInt(start_num)){
                var url2 = "<?= Yii::$app->homeUrl ?>?r=total-report/grid&startDate="+start
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