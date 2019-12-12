<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tablig */

$this->title = 'ایجاد تبلیغ';
$this->params['breadcrumbs'][] = ['label' => 'تبلیغ ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
