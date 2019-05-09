<!DOCTYPE html>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
?>
<head>
    <link rel="icon" type="image/png" href="images/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=Yii::$app->request->baseUrl?>/css/main.css">
</head>

<body>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Complated!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif;


?>





<div class="limiter">
    <div class="container-login100" style="background-color: #f0f32f;">
        <div class="wrap-login100">
            <?php $form = ActiveForm::begin([

            ]); ?>
            <span class="login100-form-logo">
						<!--<i class="zmdi zmdi-landscape"></i>-->
						<img src="images/logo3.png" alt="Smiley face" width="110" height="100
">

					</span>
            <br>
            <span class="login100-form-title p-b-34 p-t-27">سیستم مدیریتی 118 استان فارس
					</span>


            <div class="wrap-input100 validate-input" data-validate = "Enter username">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true,'class'=>'input100','placeholder'=>'نام کاربری','dir'=>'rtl'])->label('') ?>

            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'class'=>'input100','placeholder'=>'رمز عبور','dir'=>'rtl'])->label('') ?>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Enter captcha">
                <?= $form->field($model, 'captcha')->widget(Captcha::className()) ?>
            </div>






            <div class="container-login100-form-btn">
                <?= Html::submitButton('ورود', ['class'=> 'login100-form-btn']); ?>
            </div>

            <br><br>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>


</body>
