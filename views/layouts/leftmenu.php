
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
                    <a href="#"></a>
                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=khabar">
                        <i class="fa fa-newspaper-o"></i> <span>خبر</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=gorooh">
                        <i class="fa fa-folder-o"></i> <span>گروه</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=didgah">
                        <i class="fa fa-commenting-o"></i> <span>دیدگاه</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=manager">
                        <i class="fa fa-user-o"></i> <span> مدیر</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=tablig">
                        <i class="fa fa-money"></i> <span> تبلیغ</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=weather">
                        <i class="fa fa-sun-o"></i> <span> آب و هوا</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=speak">
                        <i class="fa fa-smile-o"></i> <span> حرف مردم</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=update">
                        <i class="fa fa-file-text-o"></i> <span> آپدیت</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl ?>?r=comment">
                        <i class="fa fa-comments-o"></i> <span> ارسال نظرات</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl?>?r=manager%2Fupdate&id=<?php if(isset($identity))echo ($identity->id)?>">
                        <i class="fa fa-tachometer"></i> <span> تغییر مشخصات </span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>
                </li>

                <li>
                    <a href="<?= Yii::$app->homeUrl?>?r=site/logout" data-method="post">
                        <i class="fa fa-sign-out"></i> <span> خروج</span>
                        <span class="pull-left-container">
            </span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
