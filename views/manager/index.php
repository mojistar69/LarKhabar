<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManagerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'مدیران';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header bg-orange-active">
            <h1 class="box-title " > مدیر</h1>
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

            <div class="manager-index">
                <p>
                    <a href="<?= Yii::$app->homeUrl ?>?r=manager%2Fcreate" class="btn btn-flat btn-info">
                        ایجاد مدیر  <i class="fa fa-plus"></i>
                    </a>
                </p>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => '',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        'family',
                        'username',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>

        </div>
    </div>
</div>


