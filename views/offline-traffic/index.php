<?php
use app\assets\AppAsset;
use app\controllers\yii\helpers\Json;$this->title = 'ترافیک آفلاین';
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<div class="row">
    <div class="box">
        <div class="box-header bg-orange-active">
            <h3 class="box-title text-white"> ترافیک آفلاین</h3>
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body  bg-gray-light text-black">
            <div class="container" style="max-width: 500px;">
                <div class="form-group">
                    <div class="input-group">
                        <label for="startDate">از تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                             data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true"
                             data-enabletimepicker="false" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'startDate', 'id' => 'startDate', 'value' => $startDatetime]) ?>
                    </div>

                    <div class="input-group">
                        <label for="endDate">تا تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                             data-targetselector="#toDate1" data-groupid="group1" data-todate="true"
                             data-enabletimepicker="true" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'endDate', 'id' => 'endDate', 'value' => $endDatetime]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="nav-tabs-custom " style="cursor: move;" align="center">

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
                                                    text: 'اپراتور'
                                                }
                                            },
                                            tooltip: {
                                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                                    '<td style="padding:0"><b>{point.y} اپراتور</b></td></tr>',
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
                                                name: 'وضعیت اپراتورها',
                                                data: [0, 0, 0]
                                            }]
                                        });
                                });
                            </script>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="nav-tabs-custom" style="cursor: move;" align="center">
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
                                                text: 'وضعیت تماس ها'
                                            },
                                            subtitle: {
                                                text: 'تعداد'
                                            },
                                            tooltip: {
                                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0"> </td>' +
                                                    '<td style="padding:0"><b>{point.percentage:.1f}%</b>  نفر{point.y:,.0f}</td></tr>',
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

                    </div>
                </div>



            </div>
        </div>
    </div>
</div>





<!-- /.row (main row) -->


<script>
    setInterval(function () { OfflineTrafficChartdetails(); }, 3000);
</script>

<script type="text/javascript">
    function OfflineTrafficChartdetails() {
        var cityId=$('#cityId').val();
        var zoneId=$('#zoneId').val();
        if(!cityId) cityId=0;
        if(!zoneId) zoneId=0;
        var startdate=$('#startDate').val();
        var enddate=$('#endDate').val();

        $.ajax({
            url: 'index.php?r=offline-traffic/refresh-data',
            data: "startdate=" +startdate  + "&enddate=" + enddate+"&zoneId=" +zoneId  + "&cityId=" + cityId,
            type: 'GET',
            dataType: "json",

            success: OnSuccess_,
            error: OnErrorCall_
        });

        function OnSuccess_(data) {
            console.log(data);
            response = (data[0]);
            reDrawChart((response[0]),(response[1]),data[1]);

            ///////////////////////////
            //////////////////////////


        }
        function OnErrorCall_(data) {
            console.log(data);
            console.log("اتصال به سرور قطع می باشد!");
        }
    }
</script>

<script type="text/javascript">
    function reDrawChart(seriesData1,seriesData2,seriesData4) {
        mChart1.series[0].update({
            data: seriesData1
        }, true);

        mChart4.series[0].setData(seriesData4.filter(function (d) { return d.y > 0 }));
    }
</script>
