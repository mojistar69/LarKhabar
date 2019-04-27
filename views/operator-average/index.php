<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use faravaghi\jalaliDatePicker\jalaliDatePicker;


AppAsset::register($this);

?>


<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> میانگین عملکرد اپراتور</h3>
            <!-- tools box -->
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <!--/////////////////////////////////////////////////-->

            <div class="container" style="max-width: 500px;">
                <?php ActiveForm::begin(['action'=>['operator-average/grid'],'options'=>['method'=>'post']]); ?>
                <div class="form-group">
                    <div class="input-group">
                        <label for="startDate">از تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true" data-enabletimepicker="false" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'startDate', 'id' => 'startDate']) ?>
                    </div>

                    <div class="input-group">
                        <label for="endDate">تا تاریخ</label>
                        <div class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#toDate1" data-groupid="group1" data-todate="true" data-enabletimepicker="true" data-placement="left">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <?= jDate\DatePicker::widget(['name' => 'endDate', 'id' => 'endDate']) ?>
                    </div>
                </div>

                <div class="form-group" align="center">
                    <?= Html::submitButton(Yii::t('app', 'جستجو'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /.col -->
    <!-- /.box -->

    <!-- /.box -->
    <!-- /.col -->
</div>

