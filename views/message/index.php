<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پیام ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messageofuser-index">
    <div class="row">
        <div class="box">
            <div class="box-header bg-blue-active">
                <h3 class="box-title">پیام های دریافتی</h3>
                <div class="pull-left box-tools">
                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="box-body bg-info text-black">
                <?php  Pjax::begin(['id' => 'pjax-grid-view','enablePushState' => false]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => 'خوانده نشده'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute' => 'operator_family',
                            'value' => function($model) { return $model['operator']['name']  . " ". $model['operator']['family'] ;},
                            'headerOptions' => ['width' => '180'],
                            'label' => 'فرستنده'
                        ],
                        [
                            'attribute' => Yii::t( 'app', ' تاریخ ارسال '),
                            'format' => 'raw',
                            'value' => function ($searchModel) {
                                $date = new DateTime($searchModel['sendDate']);

                                return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                            },
                        ],
                        [
                            'attribute' => Yii::t( 'app', ' تاریخ مشاهده '),
                            'format' => 'raw',
                            'value' => function ($searchModel) {
                                $date = new DateTime($searchModel['seenDate']);
                                if($searchModel['seenDate']!=null)
                                return Yii::$app->jdate->date("o/n/d – H:i", (int) strtotime($date->format('Y-m-d H:i:s')));
                                else
                                    return 'خوانده نشده';
                            },
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'امکانات',
                            'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{view}{reply}{delete}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                        'title' => Yii::t('app', 'مشاهده'),
                                    ]);
                                },

                                'reply' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'پاسخ'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('app', 'حذف'),
                                    ]);
                                }

                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'view') {
                                    $url ='index.php?r=message/view&id='.$model->id;
                                    return $url;
                                }

//                                if ($action === 'update') {
//                                    $url ='index.php?r=client-login/lead-update&id='.$model->id;
//                                    return $url;
//                                }
                                if ($action === 'delete') {
                                    $url ='index.php?r=message/delete&id='.$model->id;
                                    return $url;
                                }

                            }
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

</div>
