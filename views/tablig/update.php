<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tablig */

$this->title = 'ویرایش تبلیغ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'تبلیغ ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ویرایش';
?>
<div class="tablig-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
