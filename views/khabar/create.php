<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Khabar */

$this->title = 'ایجاد خبر';
$this->params['breadcrumbs'][] = ['label' => 'خبرها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="khabar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
