<?php

use jDate\DatePicker;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'اپراتور های آنلاین';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="box">
        <div class="box-header bg-green-active">
            <h3 class="box-title">اپراتورهای آنلاین</h3>
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body bg-gray-light text-black">
            <div class="container" style="max-width: 500px;">

            </div>
            <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'cityname',
                        'value' => 'city.name',
                        'label' => 'شهر'
                    ],
                    [
                        'attribute' => 'operator_number',
                        'label' => ' اپراتور',
                        'value' => 'operator.opnumber'
                    ],
                    [
                        'attribute' => 'name',
                        'value' => 'operator.name',
                        'label' => 'نام اپراتور'
                    ],
                    [
                        'attribute' => 'operator_family',
                        'value' => 'operator.family',
                        'headerOptions' => ['width' => '180'],
                        'label' => ' نام خانوادگی اپراتور'
                    ],
                    [
                        'attribute' => 'localip',
                        'value' => 'localip',
                        'headerOptions' => ['width' => '180'],
                        'label' => ' آی پی'
                    ],
                    [
                        'attribute' => 'زمان ورود',
                        'format' => 'raw',
                        'value' => function ($searchModel) {
                            $date = new DateTime($searchModel['logindatetime']);
                            return Yii::$app->jdate->date("o/n/d – H:i", (int)strtotime($date->format('Y-m-d H:i:s')));
                        },
                    ],

                    [

                        'attribute' => 'state',
                        'label' => 'وضعیت',
                        'value' => function ($Model) {
                            if ($Model['state']==1)
                                return 'درحال مکالمه' ;
                            else
                                return 'آزاد' ;
                        },

                    ],
                    [
                        'label' => 'خروج',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::a('خروج', ['/currentoperators']);
                        },
                    ],


                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
</div>

<script>
    setInterval(function () { OnlineTrafficChartdetails(); }, 5000);

</script>

<script type="text/javascript">
    function OnlineTrafficChartdetails() {
        $.pjax.reload({container:'#pjax-grid-view'});
    }
</script>


