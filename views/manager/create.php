<?php

use yii\helpers\Html;
$this->title = 'ایجاد مدیر';
$this->params['breadcrumbs'][] = ['label' => 'مدیر', 'url' => ['index']];
$this->params['breadcrumbs'][] =$this->title ;
?>
<div class="manager-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
