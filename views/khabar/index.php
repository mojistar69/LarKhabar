<?php

use app\models\Gorooh;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
//use dosamigos\datepicker\DatePicker;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <section class="col-lg-12 col-md-12">
        <div class="box box">
            <div class="box-header bg-gray-light">

                <h3 class="box-title">خبرها</h3>
                <!-- tools box -->
                <div class="pull-left box-tools">
                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <div class="box-body bg-gray-light">

                <!-- /.box -->



                <!--/////////////////////////////////////////////////-->

                <div class="city-index">

                    <p>
                        <a href="<?= Yii::$app->homeUrl ?>?r=khabar%2Fcreate" class="btn btn-flat btn-info">
                            ایجاد خبر  <i class="fa fa-plus"></i>
                        </a>
                        <a href="<?= Yii::$app->homeUrl ?>?r=khabar%2Findex" class="btn btn-flat btn-primary">
                            نمایش همه  <i class="fa fa-search"></i>
                        </a>

                    </p>
                    <?php  Pjax::begin(['id' => 'pjax-grid-view','enablePushState' => false]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'summary'=> "",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'id',
                                'format' => 'raw',
                                'value' => 'id',
                                'enableSorting' => false,
                                'contentOptions' => ['style' => 'width: 20px'],
                                'headerOptions' => ['width' => '20'],
                                'label' => ' آیدی',
                            ],
                            [

                                'format' => ['image',['width'=>'30','height'=>'30']],
                                'value'=>function($data) { return $data->imageurlk; },
                            ],
                            [
                                'attribute' => 'goroohname',
                                'filter'=>ArrayHelper::map(Gorooh::find()->asArray()->all(), 'onvan', 'onvan'),
                                'value' => 'tbl_gorooh.onvan',
                                'label' => 'گروه',
                                'enableSorting' => false,
                                'contentOptions' => ['style' => 'font-size:12px;'],
                                'headerOptions' => ['width' => '150'],
                            ],
                            [
                                'attribute' => 'slide',
                                'format' => 'raw',
                                'enableSorting' => false,
                                'value' => function($model) {
                                    if ($model['slide']==1)  return '<span class="label label-warning">ویژه</span>';
                                    else return '';},
                                'headerOptions' => ['width' => '50'],
                                'filter'=>array("1"=>"ویژه","0"=>"عادی"),
                                'label' => 'نوع'
                            ],
//                            [
//                                'attribute' => 'lid',
//                                'value' => 'lid',
//                                'label' => 'لید',
//                                'contentOptions' => ['style' => 'font-size:12px;'],
//                            ],

                            [

                                'attribute' => 'titr',
                                'value' => 'titr',
                                'contentOptions' => ['style' => 'font-size:12px;'],
                                'label' => 'تیتر',
                                'enableSorting' => false,
                            ],
//                            //Tarikh
                            [
                                'attribute' => 'tarikh',
                                'format' => 'html',
                                'headerOptions' => ['width' => '120'],
                                'enableSorting' => false,
                                'contentOptions' => ['style' => 'max-width: 60px'],
                                'label' => 'تاریخ درج',
                                'value' => function ($searchModel) {
                                    $date = new DateTime($searchModel['tarikh']);
                                    return Yii::$app->jdate->date("o/n/d – H:i:s", (int)strtotime($date->format('Y-m-d H:i:s')));
                                },
                                'filter' =>  jDate\DatePicker::widget([
                                'model' => $searchModel, 'attribute' => 'tarikh',
                            ]) ,

                            ],

                            [
                                'attribute' => 'taeed',
                                'format' => 'raw',
                                'enableSorting' => false,
                                'value' => function($model) {
                                    if ($model['taeed']==1)  return '<span class="label label-success">تایید</span>';
                                    else return '<span class="label label-danger">عدم تایید</span>';},
                                'headerOptions' => ['width' => '100'],
                                'filter'=>array("1"=>"تایید","0"=>"عدم تایید"),
                                'label' => ' وضعیت'
                            ],

                            [
                                'attribute' => 'view',
                                'value' => 'view',
                                'label' => 'بازدید',
                                'enableSorting' => false,
                                'filter'=>array("1"=>"پر بازدید ترین","0"=>"کم بازدید ترین"),
                            ],
                            //'viewtype',
                            //'view_fm',

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
                    <?php Pjax::end(); ?>
                </div>





            </div>
        </div>
    </section>
</div>
<!-- /.row -->

<div class="row"></div>


<div class="row"></div>
<!-- /.row (main row) -->


