<?php

use yii\grid\GridView;
use yii\helpers\Html;
use app\assets\AppAsset;
use jDate\DatePicker;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use kartik\export\ExportMenu;
$this->title = 'آرشیو تماس ها';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [
    
                        [
                        'attribute' => 'تاریخ',
                        'format' => 'raw',
                        'headerOptions' => ['width' => '180'],
                        'contentOptions' => ['style' => 'max-width: 80px'],


                        'value' => function ($searchModel) {
                            $date = new DateTime($searchModel['startdatetime']);
                            return Yii::$app->jdate->date("o/n/d – H:i", (int)strtotime($date->format('Y-m-d H:i:s')));
                        },
                    ],
    
                       [
                        'attribute' => 'cityname',
                        'value' => 'city.name',
                        'label' => 'شهر',
                    ],

                   [
                     'attribute' => 'ofamily',
                     'value' => 'operator.family',
                     'headerOptions' => ['width' => '80'],
                     'label' => ' نام خانوادگی اپراتور'
                     ],
                    [
                        'attribute' => 'operator_number',
                        'label' => 'شماره اپراتور',
                        'value' => 'operator.opnumber'
                    ],
                     [
                        'attribute' => 'callerid',
                        'label' => 'تماس گیرنده',
                        'value' => 'callerid',

                    ],   
    
  [
   'attribute' => 'calluid',
   'label' => 'شناسه تماس',
   'value' => 'calluid'
 ],    
    ['class' => 'yii\grid\SerialColumn'],
];

AppAsset::register($this);
?>

<div class="row">
    <div class="box">
        <div class="box-header bg-orange-active">
            <h3 class="box-title"> آرشیو تماس ها</h3>
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body bg-gray-light text-black">
            
            <div class="row">
        <div class="col-md-3">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">بازه ابتدا</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label> تاریخ</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                                              <?= jDate\DatePicker::widget(['name' => 'startDate', 'id' => 'startDate',
                                'value' => $startDatetime]) ?>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input  type="time" name="startTime" id="startTime" width='100%' value=<?=$startTime?>>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
    
    
    
    <div class="col-md-3">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">بازه انتها</h3>
            </div>
            <div class="box-body">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label> تاریخ</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                                              <?= jDate\DatePicker::widget(['name' => 'endDate', 'id' => 'endDate',
                                'value' => $endDatetime]) ?>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  type="time" name="endTime" id="endTime" width='100%' value=<?=$endTime?>>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
                <div style="display:block; height: 10%;">
                    
                </div>
                <button id="searchbtn" class="btn btn-info btn-lg">جستجو <i class="fa fa-search"></i></button> 
    
</div>
        <!-- /.col (left) -->

            </div>
            <?php
            
                        if (isset($dataProvider)) {

            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
            ]);
            echo  GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => [
                    'class' => 'YourCustomTableClass',
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'calluid',
                        'label' => 'شناسه تماس',
                        'value' => 'calluid'

                    ],
                    [
                        'attribute' => 'callerid',
                        'label' => 'تماس گیرنده',
                        'value' => 'callerid',

                    ],
                    [
                        'attribute' => 'operator_number',
                        'label' => 'شماره اپراتور',
                        'value' => 'operator.opnumber'
                    ],

                    [
                        'attribute' => 'operator_family',
                        'value' => function($model) { return $model['operator']['name']  . " ". $model['operator']['family'] ;},
                        'headerOptions' => ['width' => '180'],
                        'label' => '  اپراتور'
                    ],
                    [
                        'attribute' => 'cityname',
                        'value' => 'city.name',
                        'label' => 'شهر',
                    ],
                    [
                        'attribute' => 'تاریخ',
                        'format' => 'raw',
                        'headerOptions' => ['width' => '180'],
                        'contentOptions' => ['style' => 'max-width: 80px'],


                        'value' => function ($searchModel) {
                            $date = new DateTime($searchModel['startdatetime']);
                            return Yii::$app->jdate->date("o/n/d – H:i", (int)strtotime($date->format('Y-m-d H:i:s')));
                        },
                    ],


                ],
            ]);

            }
            ?>
        </div>
    </div>
                        <input type="hidden" id="startDate" name="startDate" value="<?php echo $startDatetime ?>">
                        <input type="hidden" id="endDate"  name="endDate" value="<?php echo $endDatetime ?>">
</div>

<script>
    $(document).ready(function () {
        var date = '&startDate=' + $("#startDate").val() + '&endDate=' + $("#endDate").val()
        +'&startTime='+$( "#startTime" ).val()+'&endTime='+$( "#endTime" ).val();
        $(".pagination li").each(function () {
            if ($(this).find('a').attr('href'))
                $(this).find('a').attr('href', $(this).find('a').attr('href') + date);
        });
    });
</script>


<script type="text/javascript">
    $( "#searchbtn" ).click(function() {
        var start = $( "#startDate" ).val()
        var end = $( "#endDate" ).val()
        var start_time = $( "#startTime" ).val()
        var end_time = $( "#endTime" ).val()
        var email = /^[1-4]\d{3}\/((0[1-6]\/((3[0-1])|([1-2][0-9])|(0[1-9])))|((1[0-2]|(0[7-9]))\/(30|([1-2][0-9])|(0[1-9]))))$/;
        if (email.test(start) && email.test(end) ) {
            var start_num=start.substring(2,4)+start.substring(5,7)+start.substring(8,10);
            var end_num=end.substring(2,4)+end.substring(5,7)+end.substring(8,10);
            
            var stime_num=start_time.substring(0,2)+start_time.substring(3,5)+start_time.substring(6,8);
            var etime_num=end_time.substring(0,2)+end_time.substring(3,5)+end_time.substring(6,8);

            if(parseInt(end_num)>parseInt(start_num))
            {
              var url2 = "<?= Yii::$app->homeUrl ?>?r=archive-call/grid&startDate="+start
              +"&endDate="+end+"&startTime="+start_time+"&endTime="+end_time;
              window.location = url2;
            }
            else if(parseInt(end_num)==parseInt(start_num))
            {
                if(parseInt(etime_num)>=parseInt(stime_num))
                {var url2 = "<?= Yii::$app->homeUrl ?>?r=archive-call/grid&startDate="+start
              +"&endDate="+end+"&startTime="+start_time+"&endTime="+end_time;
              window.location = url2;
          }
                else alert("بازه انتخابی نامعتبر است")
            }
            else
            {
               alert("بازه انتخابی نامعتبر است") 

        }
        }
        else {
            alert("فرمت تاریخ وارد شده صحیح نیست")
        }
    });
</script>
