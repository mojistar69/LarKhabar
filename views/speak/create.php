<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Speak */

$this->title = 'Create Speak';
$this->params['breadcrumbs'][] = ['label' => 'Speaks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="speak-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
