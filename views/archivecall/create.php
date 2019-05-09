<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Archivecall */

$this->title = 'Create Archivecall';
$this->params['breadcrumbs'][] = ['label' => 'Archivecalls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivecall-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
