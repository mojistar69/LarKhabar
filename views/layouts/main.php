<?php

use app\models\City;
use app\models\Zone;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <?php $this->head() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title>داشبرد | کنترل پنل مدیریت</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="dist/css/SansPro.css">

    <!-- High Chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
<!--    <script src="dist/js/highcharts.js"></script>-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">118</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg" >            سامانه مرکز 118
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>


            <div class="navbar-custom-menu"></div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p>مجتبی مصری</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">منو</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>تعاریف اولیه</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> شهر</a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i> مدیر</a></li>
                        <li><a href="index2.html"><i class="fa fa-circle-o"></i> اپراتور</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>گزارش ها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>ترافیک آنلاین</a></li>
                        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i>کارکرد اپراتور</a></li>
                        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i>آرشیو اپراتور</a></li>
                        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>جزئیات عملکرد اپراتور</a>
                        </li>
                        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>میانگین عملکرد اپراتور</a>
                        </li>
                        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i>آمار کلی تماس ها</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>امکانات</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> تغییر کلمه عبور</a></li>

                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <!-- / .box select city-->
            <div class="row" align="right">
                <!-- /.box -->
                <div class="box-body no-padding">

                    <div style="height:40px; width:200px;" class="form-group">
                        <table width="400">
                            <tr >

                                <td width="40"><label> &nbsp;&nbsp;&nbsp;منطقه</label></td>
                                <td width="100">
                                <?php $form = ActiveForm::begin();
                                $zones = ArrayHelper::map(Zone::find()->all(), 'id', 'name'); ?>
                                <?= Html::dropDownList("zoneId", null, $zones,
                                    ['prompt' => 'کل استان', 'id' => 'zoneId', 'class' => 'form-control',
                                        'onchange' => '
                                                $.get("index.php?r=city/lists&id=' . '"+$(this).val(),function(data){
                                                $("#cityId").html(data);
                                                });'
                                    ]);
                                ?>
                                <?php ActiveForm::end(); ?>
                                </td>
                                <td><label> &nbsp;&nbsp;شهر</label></td>
                                <td >
                                    <?php $form = ActiveForm::begin();
                                    $cities = ArrayHelper::map(City::find()->all(), 'id', 'name');
                                    ?>
                                    <?= Html::dropDownList("cityId", null, $cities, ['prompt' => 'انتخاب', 'id' => 'cityId', 'class' => 'form-control']) ?>
                                    <?php ActiveForm::end(); ?>
                                </td>
                            </tr>


                            <tr>

                            </tr>
                        </table>

                        <br>
                    </div>

                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اپراتورها</h3>
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
                        <table class="table table-condensed">
                            <tbody>
                            <tr>

                                <td align="center">اپراتورهای سیستم</td>
                                <td align="center">اپراتورهای محلی</td>
                                <td align="center">اپراتورهای غیر محلی</td>
                                <td align="center">زمان پاسخ دهی</td>
                                <td align="center">میانگین زمان</td>
                            </tr>
                            <tr>

                                <td align="center">
                                    <span name="txtCountOp" class="badge bg-red">0</span></td>
                                <td align="center">
                                    <span name="txtCountActiveOp" class="badge bg-yellow">0</span></td>
                                <td align="center">
                                    <span name="txtUnLocal" class="badge bg-green">0</span></td>
                                <td align="center">
                                    <span name="txtTotalTime" class="badge bg-blue">00:00:00</span></td>
                                <td align="center">
                                    <span name="txtAvgTime" class="badge bg-orange">00:00:00</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.col -->
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">تماس ها</h3>
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
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td align="center">تماس های وارده</td>
                                <td align="center">قطع مشترک در حالت انتظار</td>
                                <td align="center">پاسخ گویی توسط اپراتور</td>
                                <td align="center">قطع تماس از طرف مشترک</td>
                                <td align="center">مزاحم</td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <span name="txtEnteredCall" class="badge bg-red">0</span></td>
                                <td align="center">
                                    <span name="txt401402" class="badge bg-yellow">0</span></td>
                                <td align="center">
                                    <span name="txt301304219" class="badge bg-green">0</span></td>
                                <td align="center">
                                    <span name="txt203" class="badge bg-blue">0</span></td>
                                <td align="center">
                                    <span name="txtDisturber" class="badge bg-orange">0</span></td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>

                            </tr>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </section>

        <!-- Main content -->
        <section class="content">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>

            <?= $content ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-left">
        <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Matcotre</a> <a
                    href="http://www.matcore.ir/"></a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">فعالیت ها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">تولد غلوم</h4>

                                <p>۲۴ مرداد</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">آپدیت پروفایل سجاد</h4>

                                <p>تلفن جدید (800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">نورا به خبرنامه پیوست</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">کرون جابز اجرا شد</h4>

                                <p>۵ ثانیه پیش</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">پیشرفت کارها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                ساخت پوستر های تبلیغاتی
                                <span class="label label-danger pull-left">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت رزومه
                                <span class="label label-success pull-left">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت لاراول
                                <span class="label label-warning pull-left">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                بخش پشتیبانی سایت
                                <span class="label label-primary pull-left">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">وضعیت</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">تنظیمات عمومی</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            گزارش کنترلر پنل
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            ثبت تمامی فعالیت های مدیران
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            ایمیل مارکتینگ
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            اجازه به کاربران برای ارسال ایمیل
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            در دست تعمیرات
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            قرار دادن سایت در حالت در دست تعمیرات
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">تنظیمات گفتگوها</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            آنلاین بودن من را نشان نده
                            <input type="checkbox" class="pull-left" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            اعلان ها
                            <input type="checkbox" class="pull-left">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            حذف تاریخته گفتگوهای من
                            <a href="javascript:void(0)" class="text-red pull-left"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<!--<script src="bower_components/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!--Refresh headerInformation table -->
<script>
    setInterval(function () { chartdetails(); }, 3000);
</script>

<script type="text/javascript">
    function chartdetails() {
        var cityId=$('#cityId').val();
        var zoneId=$('#zoneId').val();
        if(!cityId) cityId=0;
        if(!zoneId) zoneId=0;
        $.ajax({
            url: 'index.php?r=dashboard/refresh-data',
            data: "zoneId=" +zoneId  + "&cityId=" + cityId,
            type: 'GET',
            dataType: "json",

            success: OnSuccess_,
            error: OnErrorCall_
        });

        function OnSuccess_(data) {
            console.log(data);
            //txtCountOp
            $('span[name="txtCountOp"]').empty();
            $('span[name="txtCountOp"]').append('<span name="txtCountOp" class="badge bg-red">' + data[0] + '</span>');

            //txtCountActiveOp
            $('span[name="txtCountActiveOp"]').empty();
            $('span[name="txtCountActiveOp"]').append('<span name="txtCountActiveOp" class="badge bg-yellow">' + data[1] + '</span>');
            //UnLocal
            $('span[name="txtUnLocal"]').empty();
            $('span[name="txtUnLocal"]').append('<span name="txtUnLocal" class="badge bg-green">' + data[2] + '</span>');
            //TotalTime
            $('span[name="txtTotalTime"]').empty();
            $('span[name="txtTotalTime"]').append('<span name="txtTotalTime" class="badge bg-blue">' + data[3] + '</span>');
            //txtAvgTime
            $('span[name="txtAvgTime"]').empty();
            $('span[name="txtAvgTime"]').append('<span name="txtAvgTime" class="badge bg-orange">' + data[4] + '</span>');

            //////////////////////////////////////
            ////////////////////////////////////
            //txtEnteredCall
            $('span[name="txtEnteredCall"]').empty();
            $('span[name="txtEnteredCall"]').append('<span name="txtEnteredCall" class="badge bg-red">' + data[5] + '</span>');

            //txt401402
            $('span[name="txt401402"]').empty();
            $('span[name="txt401402"]').append('<span name="txt401402" class="badge bg-yellow">' + data[6] + '</span>');
            //txt301304219
            $('span[name="txt301304219"]').empty();
            $('span[name="txt301304219"]').append('<span name="txt301304219" class="badge bg-green">' + data[7] + '</span>');
            //txt203
            $('span[name="txt203"]').empty();
            $('span[name="txt203"]').append('<span name="txt203" class="badge bg-blue">' + data[8] + '</span>');
            //txtDisturber
            $('span[name="txtDisturber"]').empty();
            $('span[name="txtDisturber"]').append('<span name="txtDisturber" class="badge bg-orange">' + data[9] + '</span>');

            ///////////////////////////
            //////////////////////////
        }
        function OnErrorCall_(data) {
            console.log(data);
            console.log("اتصال به سرور قطع می باشد!");
        }
    }
</script>
</body>
</html>
<?php $this->endPage() ?>
