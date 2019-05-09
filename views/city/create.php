<?php

use yii\helpers\Html;

$this->title = 'ثبت شهر';
$this->params['breadcrumbs'][] = ['label' => 'شهر', 'url' => ['index']];
$this->params['breadcrumbs'][] =$this->title ;
?>
<div class="city-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
