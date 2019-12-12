<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gorooh */

$this->title = 'ویرایش گروه ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'گروه ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ویرایش';
?>
<div class="gorooh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
