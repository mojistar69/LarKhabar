<?php

use app\models\Khabar;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'دیدگاه';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="didgah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد دیدگاه', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="<?= Yii::$app->homeUrl ?>?r=didgah%2Findex" class="btn btn-flat btn-primary">
            نمایش همه  <i class="fa fa-search"></i>
        </a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => 'id',
                'enableSorting' => false,
                'label' => ' آیدی',
            ],
            [
                'attribute' => 'g_id',
                'filter'=>ArrayHelper::map(Khabar::find()->asArray()->all(), 'id', 'id'),
                'format' => 'raw',
                'enableSorting' => false,
                'value' => 'g_id',
                'label' => 'آیدی خبر',
            ],
            [
                'attribute' => 'khabarname',
                'value' => 'tbl_khabar.titr',
                'label' => 'خبر',
                'enableSorting' => false,
                'contentOptions' => ['style' => 'font-size:12px;'],
                'headerOptions' => ['width' => '150'],
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($model) {
                    return '<span class="label label-default">'.$model['name'].'</span>';
                },
                'enableSorting' => false,
                'headerOptions' => ['width' => '100'],
                'label' => 'صاحب دیدگاه',
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => function($model) {
                    return '<span class="label label-default">'.$model['email'].'</span>';
                },
                'enableSorting' => false,
                'headerOptions' => ['width' => '100'],
                'label' => 'ایمیل',
            ],
            [
                'attribute' => 'matn',
                'format' => 'raw',
                'value' => function($model) {
                    return '<span class="label label-default">'.$model['matn'].'</span>';
                    },
                'enableSorting' => false,
                'headerOptions' => ['width' => '100'],
                'label' => 'متن',
            ],
            [
                'attribute' => 'tarikh',
                'format' => 'raw',
                'enableSorting' => false,
                'headerOptions' => ['width' => '180'],
                'contentOptions' => ['style' => 'max-width: 80px'],
                'value' => function ($searchModel) {
                    $date = new DateTime($searchModel['tarikh']);
                    return Yii::$app->jdate->date("o/n/d – H:i:s", (int)strtotime($date->format('Y-m-d H:i:s')));
                },
            ],
            [
                'attribute' => 'taeed',
                'format' => 'raw',
                'value' => function($model) {
                    if ($model['taeed']==1)  return '<span class="label label-success">تایید</span>';
                    else return '<span class="label label-danger">عدم تایید</span>';},
                'enableSorting' => false,
                'headerOptions' => ['width' => '100'],
                'filter'=>array("1"=>"تایید","0"=>"عدم تایید"),
                'label' => ' وضعیت'
            ],

            ['class' => 'yii\grid\ActionColumn',
                'header' => 'امکانات',
                'template' => '{view}{update}{delete}{confirm}{disapproval}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'مشاهده'),
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'ویرایش'),
                        ]);
                    },

                    'confirm' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                            'title' => Yii::t('app', 'تایید'),
                        ]);
                    },
                    'disapproval' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'title' => Yii::t('app', 'عدم تایید'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'حذف'),
                        ]);
                    }

                ],
            ],
        ],
    ]); ?>
</div>
