<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\City;
use app\models\Zone;

?>


<div class="box-body no-padding">

    <div style="height:40px; width:200px;" class="form-group">
        <table width="400">
            <tr >

                <td width="40"><label> &nbsp;&nbsp;&nbsp;منطقه</label></td>
                <td width="100">
                    <?php $form = ActiveForm::begin();
                    $zones = ArrayHelper::map(Zone::find()->all(), 'id', 'name'); ?>
                    <?= Html::dropDownList("zoneId", null, $zones,
                        ['prompt' => 'کل استان', 'id' => 'zoneId', 'class' => 'form-control',
                            'onchange' => '
                                                $.get("index.php?r=city/lists&id=' . '"+$(this).val(),function(data){
                                                $("#cityId").html(data);
                                                });'
                        ]);
                    ?>
                    <?php ActiveForm::end(); ?>
                </td>
                <td><label> &nbsp;&nbsp;شهر</label></td>
                <td >
                    <?php $form = ActiveForm::begin();
                    $cities = ArrayHelper::map(City::find()->all(), 'id', 'name');
                    ?>
                    <?= Html::dropDownList("cityId", null, $cities, ['prompt' => 'انتخاب', 'id' => 'cityId', 'class' => 'form-control']) ?>
                    <?php ActiveForm::end(); ?>
                </td>
            </tr>


            <tr>

            </tr>
        </table>

        <br>
    </div>

</div>

<script>
    setInterval(function () { chartdetails(); }, 3000);
</script>

<script type="text/javascript">
    function chartdetails() {
        var cityId=$('#cityId').val();
        var zoneId=$('#zoneId').val();
        if(!cityId) cityId=0;
        if(!zoneId) zoneId=0;
        $.ajax({
            url: 'index.php?r=dashboard/refresh-data',
            data: "zoneId=" +zoneId  + "&cityId=" + cityId,
            type: 'GET',
            dataType: "json",

            success: OnSuccess_,
            error: OnErrorCall_
        });

        function OnSuccess_(data) {
            console.log(data);
            //txtCountOp
            $('span[name="txtCountOp"]').empty();
            $('span[name="txtCountOp"]').append('<span name="txtCountOp" class="badge bg-green">' + data[0] + '</span>');

            //txtCountActiveOp
            $('span[name="txtCountActiveOp"]').empty();
            $('span[name="txtCountActiveOp"]').append('<span name="txtCountActiveOp" class="badge bg-green">' + data[1] + '</span>');
            //UnLocal
            $('span[name="txtUnLocal"]').empty();
            $('span[name="txtUnLocal"]').append('<span name="txtUnLocal" class="badge bg-green">' + data[2] + '</span>');
            //TotalTime
            $('span[name="txtTotalTime"]').empty();
            $('span[name="txtTotalTime"]').append('<span name="txtTotalTime" class="badge bg-green">' + data[3] + '</span>');
            //txtAvgTime
            $('span[name="txtAvgTime"]').empty();
            $('span[name="txtAvgTime"]').append('<span name="txtAvgTime" class="badge bg-green">' + data[4] + '</span>');

            //////////////////////////////////////
            ////////////////////////////////////
            //txtEnteredCall
            $('span[name="txtEnteredCall"]').empty();
            $('span[name="txtEnteredCall"]').append('<span name="txtEnteredCall" class="badge bg-red">' + data[5] + '</span>');

            //txt401402
            $('span[name="txt401402"]').empty();
            $('span[name="txt401402"]').append('<span name="txt401402" class="badge bg-red">' + data[6] + '</span>');
            //txt301304219
            $('span[name="txt301304219"]').empty();
            $('span[name="txt301304219"]').append('<span name="txt301304219" class="badge bg-red">' + data[7] + '</span>');
            //txt203
            $('span[name="txt203"]').empty();
            $('span[name="txt203"]').append('<span name="txt203" class="badge bg-red">' + data[8] + '</span>');
            //txtDisturber
            $('span[name="txtDisturber"]').empty();
            $('span[name="txtDisturber"]').append('<span name="txtDisturber" class="badge bg-red">' + data[9] + '</span>');

            ///////////////////////////
            //////////////////////////
        }
        function OnErrorCall_(data) {
            console.log(data);
            console.log("اتصال به سرور قطع می باشد!");
        }
    }
</script>