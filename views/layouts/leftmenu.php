
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
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=online-traffic"><i class="fa fa-circle-o"></i>ترافیک آنلاین</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=operator-master"><i class="fa fa-circle-o"></i>کارکرد اپراتور</a></li>
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
