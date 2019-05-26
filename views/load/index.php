<?php
use app\assets\AppAsset;
$this->title = 'اوج ترافیک';
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);
?>
<div class="row">
    <div class="box">
        <div class="box-header bg-orange-active">
            <h3 class="box-title"> اوج ترافیک</h3>
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
                <div class="form-group" align="center">
                    <button id="searchbtn" class="btn btn-warning btn-lg">جستجو <i class="fa fa-search"></i></button>
                </div>

                <div class="row">
                    <div class="nav-tabs-custom" style="cursor: move;" align="center">
                        <div id="chart1" style="width:110%; height:400px;">
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
                                                type: 'line'
                                            },
                                            title: {
                                                text: 'نمودار اوج ترافیک بر اساس تماس ها'
                                            },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                                                categories: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11','12','13',
                                                    '14','15','16','17','18','19','20','21','22','23']
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'تعداد تماس'
                                                }
                                            },
                                            plotOptions: {
                                                line: {
                                                    dataLabels: {
                                                        enabled: true
                                                    },
                                                    enableMouseTracking: false
                                                }
                                            },
                                            tooltip: {
                                                headerFormat: '<span style="font-size:10px"></span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0"> </td>' +
                                                    '<td style="padding:0"><b>{point.y} تماس</b></td></tr>',
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
                                                name: 'ساعت',
                                            }]
                                        });
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="nav-tabs-custom" style="cursor: move;" align="center">
                        <div id="chart2" style="width:110%; height:400px;">
                            <script>
                                var mChart2;
                                document.addEventListener('DOMContentLoaded', function () {
                                    Highcharts.setOptions({
                                        chart: {
                                            style: {
                                                fontFamily: 'Vazir',
                                            },
                                        }
                                    });
                                    mChart2 =
                                        Highcharts.chart('chart2', {
                                            chart: {
                                                type: 'line'
                                            },
                                            title: {
                                                text: 'نمودار اوج ترافیک بر اساس اپراتور ها'
                                            },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                                                categories: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11','12','13',
                                                    '14','15','16','17','18','19','20','21','22','23']
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'تعداد اپراتورها'
                                                }
                                            },
                                            plotOptions: {
                                                line: {
                                                    dataLabels: {
                                                        enabled: true
                                                    },
                                                    enableMouseTracking: false
                                                }
                                            },
                                            tooltip: {
                                                headerFormat: '<span style="font-size:10px"></span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0"> </td>' +
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
                                                name: 'ساعت',
                                            }]
                                        });
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="nav-tabs-custom" style="cursor: move;" align="center">
                        <div id="chart3" style="width:550px; height:400px;">
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
                                                type: 'line'
                                            },
                                            title: {
                                                text: 'نمودار حدااکثر تعداد افراد در لیست انتظار'
                                            },
                                            subtitle: {
                                                text: ''
                                            },
                                            xAxis: {
                                                categories: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11','12','13',
                                                    '14','15','16','17','18','19','20','21','22','23']
                                            },
                                            yAxis: {
                                                title: {
                                                    text: 'تعداد افراد در لیست انتظار'
                                                }
                                            },
                                            plotOptions: {
                                                line: {
                                                    dataLabels: {
                                                        enabled: true
                                                    },
                                                    enableMouseTracking: false
                                                }
                                            },
                                            tooltip: {
                                                headerFormat: '<span style="font-size:10px"></span><table>',
                                                pointFormat: '<tr><td style="color:{series.color};padding:0"> </td>' +
                                                    '<td style="padding:0"><b>{point.y} افراد</b></td></tr>',
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
                                                name: 'ساعت',
                                            }]
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













<!--<script>-->
<!--    setInterval(function () { LoadChartdetails(); }, 10000);-->
<!--</script>-->

<script type="text/javascript">
    function LoadChartdetails() {
        var startdate=$('#startDate').val();
        var enddate=$('#endDate').val();
        var cityId=$('#cityId').val();
        var zoneId=$('#zoneId').val();
        if(!cityId) cityId=0;
        if(!zoneId) zoneId=0;
        $.ajax({
            url: 'index.php?r=load/refresh-data',
            data: "startdate=" +startdate  + "&enddate=" + enddate+"&zoneId=" +zoneId+ "&cityId=" + cityId ,
            type: 'GET',
            dataType: "json",

            success: OnSuccess_,
            error: OnErrorCall_
        });

        function OnSuccess_(data) {
            console.log(data);
            reDrawChart(data[0],data[1],data[2]);


        }
        function OnErrorCall_(data) {
            console.log(data);
            console.log("اتصال به سرور قطع می باشد!");
        }
    }
</script>

<script type="text/javascript">
    function reDrawChart(seriesData1,seriesData2,seriesData3) {
        mChart1.series[0].update({
            data: seriesData1
        }, true);

        mChart2.series[0].update({
            data: seriesData2
        }, true);

        mChart3.series[0].update({
            data: seriesData3
        }, true);

    }
</script>
<script type="text/javascript">
    $( "#searchbtn" ).click(function() {
        var start = $( "#startDate" ).val()
        var end = $( "#endDate" ).val()
        var email = /^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/;
        if (email.test(start) && email.test(end) ) {
            var start_num=start.substring(0,4)+start.substring(5,7)+start.substring(8,10);
            var end_num=end.substring(0,4)+end.substring(5,7)+end.substring(8,10);
            if(parseInt(end_num)>parseInt(start_num)){
                LoadChartdetails();
            }

            else{
                alert("تاریخ شروع بزرگتر از تاریخ پایان است!")
            }
        }
        else {
            alert("فرمت تاریخ وارد شده صحیح نیست")
        }
    });
</script>