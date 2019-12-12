<?php

use kartik\grid\GridView; ?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <section class="col-lg-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">

                <h3 class="box-title">خبرها</h3>
                <!-- tools box -->
                <div class="pull-left box-tools">
                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <div class="box-body">

                    <!-- /.box -->



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
                                        [
                                            'attribute' => 'goroohname',
                                            'value' => 'tbl_gorooh.onvan',
                                            'label' => 'گروه',
                                        ],
                                        'lid:ntext',

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
                                            'label' => ' وضعیت'
                                        ],

                                        [
                                            'attribute' => 'view',
                                            'value' => 'view',
                                            'label' => 'تعداد بازدید',
                                        ],
                                        //'viewtype',
                                        //'view_fm',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>





            </div>
        </div>
    </section>
</div>
<!-- /.row -->

<div class="row"></div>


<div class="row"></div>
<!-- /.row (main row) -->




<script>
    setInterval(function () { OnlineTrafficChartdetails(); }, 3000);
</script>

<script type="text/javascript">
    function OnlineTrafficChartdetails() {
        var cityId=$('#cityId').val();
        var zoneId=$('#zoneId').val();
        if(!cityId) cityId=0;
        if(!zoneId) zoneId=0;
        $.ajax({
            url: 'index.php?r=online-traffic/refresh-data',
            data: "zoneId=" +zoneId  + "&cityId=" + cityId,
            type: 'GET',
            dataType: "json",

            success: OnSuccess_,
            error: OnErrorCall_
        });

        function OnSuccess_(data) {
             console.log(data);
            response = (data[5]);
            reDrawChart((response[0]),(response[1]),data[6],data[7]);

            ///////////////////////////
            //////////////////////////

            //channelNumber
            $('span[name="channelNumber"]').empty();
            $('span[name="channelNumber"]').append('<span name="channelNumber" >' + data[0] + '</span>');

            //txt401402
            $('span[name="entranceCall"]').empty();
            $('span[name="entranceCall"]').append('<span name="entranceCall" >' + data[1] + '</span>');
            //txt301304219
            $('span[name="WaitingQueue"]').empty();
            $('span[name="WaitingQueue"]').append('<span name="WaitingQueue" >' + data[2] + '</span>');
            //Calling
            $('span[name="Calling"]').empty();
            $('span[name="Calling"]').append('<span name="Calling" >' + data[3] + '</span>');
            //listiningResult
            $('span[name="listiningResult"]').empty();
            $('span[name="listiningResult"]').append('<span name="listiningResult" >' + data[4] + '</span>');
            ////////////////////////////////////////////////chart Information
            //chart1
            //all
            $('span[name="all"]').empty();
            $('span[name="all"]').append('<span name="all" class="badge bg-red">' + '700' + '</span>');
        }
        function OnErrorCall_(data) {
            console.log(data);
            console.log("اتصال به سرور قطع می باشد!");
        }
    }
</script>

<script type="text/javascript">
    function reDrawChart(seriesData1,seriesData2,seriesData3,seriesData4) {
        mChart1.series[0].update({
            data: seriesData1
        }, true);
        mChart1.series[1].update({
            data: seriesData2
        }, true);


        mChart3.series[0].update({
            data: seriesData3
        }, true);


         mChart4.series[0].setData(seriesData4.filter(function (d) { return d.y > 0 }));
    }
</script>
