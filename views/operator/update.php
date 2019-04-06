<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operator */

$this->title = 'ویرایش اپراتور ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Operators', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->opid]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
