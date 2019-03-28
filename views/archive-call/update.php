<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\archivecall */

$this->title = 'Update Archivecall: ' . $model->calluid;
$this->params['breadcrumbs'][] = ['label' => 'Archivecalls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->calluid, 'url' => ['view', 'id' => $model->calluid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="archivecall-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
