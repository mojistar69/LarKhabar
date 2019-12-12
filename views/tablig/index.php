<?php

use app\models\Gorooh;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TabligSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'تبلیغ ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tablig-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد تبلیغ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'goroohname',
                'filter'=>ArrayHelper::map(Gorooh::find()->asArray()->all(), 'onvan', 'onvan'),
                'value' => 'tbl_gorooh.onvan',
                'label' => 'گروه',
                'enableSorting' => false,
                'contentOptions' => ['style' => 'font-size:12px;'],
                'headerOptions' => ['width' => '150'],
            ],
            'url_list:ntext',
            'url_info:ntext',
            'url_link:ntext',
            //'url_list_d:ntext',
            //'url_info_d:ntext',
            //'url_link_d:ntext',
            //'tarikh_start',
            //'tarikh_end',
            //'taeed',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
