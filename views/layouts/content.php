<?php
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\City;
use app\models\Zone;
?>
<div class="content-wrapper bg-primary">
    <section class="content-header ">

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= $this->render('dropdown.php') ?>
        <?= $this->render('information.php') ?>
        <?= $content ?>
    </section>
</div>