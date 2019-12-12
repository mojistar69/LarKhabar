<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GoroohSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'گروه ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gorooh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد گروه', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'onvan',
                'label' => 'عنوان',
                'value' => 'onvan'
            ],
            [
                'label' => 'عکس',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value'=>function($data) { return $data->imageurl; },
            ],
            [
                'attribute' => 'ax',
                'label' => 'آدرس عکس',
                'value' => 'ax'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
