<?php
use yii\widgets\Breadcrumbs;

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
        <?= $content ?>
    </section>
</div>