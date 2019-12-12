<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../web/dist/js/jquery.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>




<?php
$layout = 'primary';

if (Yii::$app->controller->action->id === 'login') {
    $layout = 'user-entry';
}


if (Yii::$app->controller->action->id === 'signup') {
    $layout = 'user-entry';
}

echo $this->render(
    $layout, ['content' => $content]
);
?>

<div class="control-sidebar-bg"></div>
</html>
<?php $this->endPage() ?>
