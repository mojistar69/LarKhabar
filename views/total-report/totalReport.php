<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;


AppAsset::register($this);

?>


<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
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
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><span name="Calling"> <?php echo $Parameter[3] ?> </span></h3>
                            <p>پاسخ داده شده تجاری</p>
                        </div>
                        <div class="icon">
                            <i class="ion-android-call"></i>

                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->

                    <div class="small-box bg-orange">
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
                            <p>میانگین زمان مکالمه</p>
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

