<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Archiveoperators */

$this->title = 'Create Archiveoperators';
$this->params['breadcrumbs'][] = ['label' => 'Archiveoperators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archiveoperators-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
