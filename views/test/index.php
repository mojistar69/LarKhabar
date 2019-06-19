<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;
use kartik\export\ExportMenu;
$gridColumns = [
    [
        'attribute' => 'family',
        'value' => 'family',
        'headerOptions' => ['width' => '80'],
        'label' => ' نام خانوادگی اپراتور'
    ],
    [
        'attribute' => 'name',
        'value' => 'name',
        'label' => 'نام'
    ],

    [
        'attribute' => 'opid',
        'label' => 'شماره اپراتور'
    ],
    [
        'attribute' => 'calluid',
        'label' => 'calluid',
        'label' => 'شماره تماس',
    ],
];

AppAsset::register($this);
?>

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

         <button id="searchbtn" class="btn btn-warning btn-lg">جستجو <i class="fa fa-search"></i></button>
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
    
</div>
        <!-- /.col (left) -->
       
<script>
    $(document).ready(function () {
        var date = '&startDate=' + $("#startDate").val() + '&endDate=' + $("#endDate").val();
        $(".pagination li").each(function () {
            if ($(this).find('a').attr('href'))
                $(this).find('a').attr('href', $(this).find('a').attr('href') + date);
        });
    });
</script>
<script type="text/javascript">
    $( "#report" ).click(function() {
        if($('td > input[type=checkbox]:checked').length == 0) {
            $("#noSelected").modal('show');
        }

        else{
            var start=$('#startDate').val();
            var end=$('#endDate').val();
            var str=0;
            var array=$('td > input[type=checkbox]:checked').map(function()
            {
                return $(this).val();
            }).get();
            var url = "<?= Yii::$app->homeUrl ?>?r=operator-master/selected&startDate="+start
                +"&endDate="+end+"&selection="+array;
            window.location = url;
        }

    });
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
                var url2 = "<?= Yii::$app->homeUrl ?>?r=test/grid&startDate="+start
                    +"&endDate="+end;
                window.location = url2;
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
