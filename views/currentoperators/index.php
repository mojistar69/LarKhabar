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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info">
                    <div class="box-header"></div>
                    <div class="box-body">
                        <!body/.>
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3><span name="CurrentOperators"> 0 </span></h3>
                                        <p>تعداد اپراتورهای آنلاین</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion-ios-barcode"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3><span name="WaitingQueue"> 0 </span></h3>
                                        <p>در صف انتظار</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion-android-contacts"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row -->
        <div class="box-body bg-gray-light text-black">
            <?php  Pjax::begin(['id' => 'pjax-grid-view','enablePushState' => false]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
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
//                            return $result = $date->format('Y-m-d H:i:s');
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
                            $addr='currentoperators/doexit';

                            return Html::a('خروج', [$addr, 'opid' => $data->opid]);
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
    setInterval(function () { OnlineCurrentOperators();
         }, 5000);

</script>

<script type="text/javascript">
    function OnlineCurrentOperators() {
            if ($.pjax) {
                $.pjax.defaults.timeout = 5000;
            }
            $.pjax.reload({container:'#pjax-grid-view'});
    }
</script>

<script>
    setInterval(function () { OnlineWaitingCallsandCurrentOperators(); }, 3000);
</script>

<script type="text/javascript">

    function OnlineWaitingCallsandCurrentOperators() {
        var cityId=$('#cityId').val();
        var zoneId=$('#zoneId').val();
        if(!cityId) cityId=0;
        if(!zoneId) zoneId=0;
        $.ajax({
            url: 'index.php?r=currentoperators/data',
            data: "zoneId=" +zoneId  + "&cityId=" + cityId,
            type: 'GET',
            dataType: "json",
            success: OnSuccess_,
            error: OnErrorCall_
        });

        function OnSuccess_(data) {
            console.log(data);
            //CurrentOperators
            $('span[name="CurrentOperators"]').empty();
            $('span[name="CurrentOperators"]').append('<span name="CurrentOperators" >' + data[0] + '</span>');

            //WaitingQueue
            $('span[name="WaitingQueue"]').empty();
            $('span[name="WaitingQueue"]').append('<span name="WaitingQueue" >' + data[1] + '</span>');

        }
        function OnErrorCall_(data) {
            console.log(data);
            console.log("اتصال به سرور قطع می باشد!");
        }
    }
</script>
