<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Backenduser */

$this->title = 'Create Backenduser';
$this->params['breadcrumbs'][] = ['label' => 'Backendusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backenduser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
