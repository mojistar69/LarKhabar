<?php

//$id=  intval(Yii::$app->user->identity->id);
//$model=TblPm::find()->where('`to`=:to or `to`=1 and `status`=1 ',array(':to'=>$id))->orderBy([
//     'id' => SORT_DESC
//  ])->all();


?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?= Yii::$app->homeUrl?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>خبر</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>لار</b>خبر</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown">
                    <a href="<?= Yii::$app->homeUrl?>?r=site/logout" data-method="post" title="خروج" class="btn btn-danger btn-group">
           <i class="fa fa-sign-out fa-lg"></i>
                    </a>
                </li>

            </ul>
        </div>


    </nav>
</header>