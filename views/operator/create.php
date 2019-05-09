<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */

$this->title = 'ایجاد اپراتور';
$this->params['breadcrumbs'][] = ['label' => 'اپراتور', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
