<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KhabarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Khabar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header bg-orange-active">
            <h1 class="box-title " > خبر</h1>
            <!-- tools box -->
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body bg-gray-light text-black">
            <!--/////////////////////////////////////////////////-->

            <div class="city-index">

                <p>
                    <a href="<?= Yii::$app->homeUrl ?>?r=khabar%2Fcreate" class="btn btn-primary btn-lg">
                        ایجاد خبر  <i class="fa fa-plus"></i>
                    </a>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'lid:ntext',
                        [
                            'attribute' => 'goroohname',
                            'value' => 'tbl_gorooh.onvan',
                            'label' => 'گروه',
                        ],
                        'titr:ntext',
                        [
                            'attribute' => ' تاریخ درج خبر',
                            'format' => 'raw',
                            'headerOptions' => ['width' => '180'],
                            'contentOptions' => ['style' => 'max-width: 80px'],
                            'value' => function ($searchModel) {
                                $date = new DateTime($searchModel['tarikh']);
                                return Yii::$app->jdate->date("o/n/d – H:i:s", (int)strtotime($date->format('Y-m-d H:i:s')));
                            },
                        ],
                        //'roo_titr:ntext',
                        //'matn:ntext',
                        //'ax_k:ntext',
                        //'ax_b:ntext',
                        //'tarikh',
                        //'manba:ntext',
                        //'film:ntext',
                        //'film_aparat:ntext',
                        //'film_onvan:ntext',
                        //'slide',
                        [
                            'attribute' => 'taeed',
                            'value' => function($model) {
                            if ($model['taeed']==1)  return 'تایید';
                            else return 'عدم تایید';},
                            'headerOptions' => ['width' => '180'],
                            'label' => '  تایید'
                        ],

                        'view',
                        //'viewtype',
                        //'view_fm',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>

        </div>
    </div>
</div>
