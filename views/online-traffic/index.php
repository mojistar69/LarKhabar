<?php
?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <section class="col-lg-12 col-md-12">
        <div class="box box-info">
            <div class="box-header">

                <h3 class="box-title">ترافیک آنلاین</h3>
                <!-- tools box -->
                <div class="pull-left box-tools">
                    <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <div class="box-body">
                <!body/.>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><span name="channelNumber"> 0 </span></h3>
                                <p>تعداد کانال</p>
                            </div>
                            <div class="icon">
                                <i class="ion-ios-barcode"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><span name="entranceCall"> 0 </span></h3>
                                <p>تماس ورودی</p>
                            </div>
                            <div class="icon">
                                <i class="ion-log-in"></i>
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
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><span name="Calling"> 0 </span></h3>
                                <p>در حال مکالمه</p>
                            </div>
                            <div class="icon">
                                <i class="ion-android-call"></i>

                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <h3><span name="listiningResult"> 0 </span></h3>
                                <p>در حال شنیدن نتایج</p>
                            </div>
                            <div class="icon">
                                <i class="ion-android-volume-up"></i>
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

<div class="row">
    <div class="nav-tabs-custom" style="cursor: move;" align="center">

        <div id="chart1" style="width:60%; height:400px;">
            <script>
            var mChart1;
            document.addEventListener('DOMContentLoaded', function () {
            Highcharts.setOptions({
            chart: {
            style: {
            fontFamily: 'Vazir',
            },
            }
            });
            mChart1 =
            Highcharts.chart('chart1', {
            chart: {
            type: 'column'
            },
            title: {
            text: 'تعداد اپراتورها'
            },
            subtitle: {
            text: ''
            },
            xAxis: {
            categories: [
            'همه اپراتورها',
            'فعال',
            'غیرفعال',
            ],
            crosshair: true
            },
            yAxis: {
            min: 0,
            title: {
            text: 'نفر'
            }
            },
            tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} نفر</b></td></tr>',
                footerFormat: '</table>',
            shared: true,
            useHTML: true
            },
            plotOptions: {
            column: {
            pointPadding: 0.2,
            borderWidth: 0
            }
            },
            series: [{
            name: 'در حال حاضر',
            data: [0, 0, 0]
            }, {
            name: 'امروز',
            data: [0, 0, 0]
            }]
            });
            });
            </script>
        </div>

    </div>

</div>


<div class="row">
    <!-- right col -->
    <section class="col-lg-7 connectedSortable ui-sortable">
        <!-- Custom tabs (Charts with tabs)-->

        <!-- /.nav-tabs-custom -->

        <!-- /.box (chat box) -->

        <div id="chart4" style="width:100%; height:400px;">

            <script>
                var mChart4;
                document.addEventListener('DOMContentLoaded', function () {
                    Highcharts.setOptions({
                        chart: {
                            style: {
                                fontFamily: 'Vazir',

                            },
                        }
                    });
                    mChart4 =
                        Highcharts.chart('chart4', {
                            chart: {
                                type: 'pie',
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                            },
                            title: {
                                text: ' تماس های امروز'
                            },
                            subtitle: {
                                text: 'تعداد'
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.percentage:.1f}%</b> ({point.y:,.0f} تماس)</td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                pie: {
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stacking: 'percent',
                                    showInLegend: true
                                }
                            },

                            series: [{
                                name: 'تماسهای امروز ',
                                data: [1]
                            }],
                            legend: {
                                labelFormatter: function () {
                                    return this.name + ' ' + (this.y ? this.y : 0)
                                }
                            }
                        });


                });
            </script>

        </div>

        <!-- TO DO List -->
    </section>
    <!-- /.right col -->
    <!-- left col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable ui-sortable">
        <!-- Map box -->
        <div class="box box-solid bg-light-blue-gradient">

            <div id="chart3" style="width:100%; height:400px;">

                <script>
                    var mChart3;
                    document.addEventListener('DOMContentLoaded', function () {
                        Highcharts.setOptions({
                            chart: {
                                style: {
                                    fontFamily: 'Vazir',
                                },
                            }
                        });
                        mChart3 =
                            Highcharts.chart('chart3', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'وضعیت تماس ها'
                                },
                                subtitle: {
                                    text: 'امروز'
                                },
                                xAxis: {
                                    categories: [
                                        'تماس جدید',
                                        'درحال انتظار',
                                        'درحال صحبت کردن',
                                        'در حال گوش دادن',
                                    ],
                                    crosshair: true
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'نفر'
                                    }
                                },
                                tooltip: {
                                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                        '<td style="padding:0"><b>{point.y:.1f} نفر</b></td></tr>',
                                    footerFormat: '</table>',
                                    shared: true,
                                    useHTML: true
                                },
                                plotOptions: {
                                    column: {
                                        pointPadding: 0.2,
                                        borderWidth: 0
                                    }
                                },
                                series: [{
                                    colorByPoint: true,
                                    name: 'وضعیت تماس ها ',
                                    data: [0, 0, 0, 0]
                                }]
                            });
                    });
                </script>

            </div>

        </div>

    </section>
    <!-- left col -->
</div>
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
