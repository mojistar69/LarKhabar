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
      <span class="logo-mini"><b>L</b>FMS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>سامانه</b>118</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <span class="hidden-xs"><?php
                  $identity=Yii::$app->user->identity;
echo $identity->username;
?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">


                <p>
                  <?php 
          
echo $identity->username;
?>
                 
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">مشخصات</a>
                </div>
                <div class="pull-right">
                  <a href="<?= Yii::$app->homeUrl?>?r=site/logout" data-method="post" class="btn btn-default btn-flat">خروج</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>