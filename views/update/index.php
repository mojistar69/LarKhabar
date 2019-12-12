<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UpdateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'آپدیت';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="update-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('آپدیت جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'desc:ntext',
            'imgurl:ntext',
            'titlenew:ntext',
            //'content:ntext',
            //'linkdown:ntext',
            //'checkdown:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
