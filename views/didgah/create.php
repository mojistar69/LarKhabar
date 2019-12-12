<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Didgah */

$this->title = 'ایجاد دیدگاه';
$this->params['breadcrumbs'][] = ['label' => 'دیدگاه', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="didgah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
