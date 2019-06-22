
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="dist/img/a1.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p><?php
                        $identity = Yii::$app->user->identity;
                        if(isset($identity)) {
                            echo $identity->username;
                        }
                  ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">منو</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>تعاریف اولیه</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="<?= Yii::$app->homeUrl ?>?r=city"><i class="fa fa-circle-o"></i> شهر</a></li>
                        <li ><a href="<?= Yii::$app->homeUrl ?>?r=zone"><i class="fa fa-circle-o"></i> منطقه</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=manager"><i class="fa fa-circle-o"></i> مدیر</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=operator"><i class="fa fa-circle-o"></i> اپراتور</a></li>
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
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=currentoperators"><i class="fa fa-circle-o"></i> نظارت  </a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=online-traffic"><i class="fa fa-circle-o"></i>ترافیک آنلاین</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=offline-traffic"><i class="fa fa-circle-o"></i>ترافیک آفلاین</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=load"><i class="fa fa-circle-o"></i>اوج ترافیک</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=disturber"><i class="fa fa-circle-o"></i>مزاحمین</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=archive-operator"><i class="fa fa-circle-o"></i>آرشیو اپراتور</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=archive-call"><i class="fa fa-circle-o"></i>آرشیو تماس ها</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=log-operators"><i class="fa fa-circle-o"></i>گزارش ورورد و خروج اپراتور</a></li>
                        <li><a href="<?= Yii::$app->homeUrl ?>?r=total-report"><i class="fa fa-circle-o"></i>آمار کلی تماس ها</a></li>
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
                        <li ><a href="<?= Yii::$app->homeUrl ?>?r=requested-number"><i class="fa fa-circle-o"></i> آمار درخواست ها</a></li>
                        <li><a href="<?= Yii::$app->homeUrl?>?r=manager%2Fupdate&id=<?php if(isset($identity))echo ($identity->id)?>"><i class="fa fa-circle-o"></i> تغییر مشخصات </a></li>

                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
