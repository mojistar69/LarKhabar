<?php
/* @var $this yii\web\View */

use yii\grid\GridView; ?>
<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header bg-orange-active">
            <h1 class="box-title " > ارسال پیام</h1>
            <!-- tools box -->
            <div class="pull-left box-tools">
                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                            class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box box-warning">

            <!-- /.box-header -->
            <div class="box-body">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>متن</label>
                        <textarea class="form-control" id="body" rows="3" placeholder="متن"></textarea>
                    </div>
                    <button id="sendbtn" class="btn btn-info btn-lg">ارسال <i class="fa fa-send"></i></button>
                    <div class="operator-index">
                        <label>ارسال به :</label>
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'summary' => '',
                            'columns' => [
                                [
                                    'class' => 'yii\grid\CheckboxColumn',
                                    'checkboxOptions' => function($model, $key, $index, $widget) {
                                        return ['value' => $model['opid'] ];
                                    },
                                ],
                                ['class' => 'yii\grid\SerialColumn'],
                                'opnumber',
                                'name',
                                'family',

                            ],
                        ]); ?>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="form-group" align="center">
            <div class="modal fade" id="noSelected" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">کاربر گرامی</h4>
                        </div>
                        <div class="modal-body">
                            <p>اپراتوری جهت ارسال پیام انتخاب نشده است!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-default" data-dismiss="modal">بستن</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="noMessage" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">کاربر گرامی</h4>
                        </div>
                        <div class="modal-body">
                            <p>متن پیام خالی است</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-default" data-dismiss="modal">بستن</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( "#sendbtn" ).click(function() {
        if($('#body').val()==''){
            $("#noMessage").modal('show');
        }
        else if($('td > input[type=checkbox]:checked').length == 0) {
            $("#noSelected").modal('show');
        }

        else{
            var body=$('#body').val();
            var array=$('td > input[type=checkbox]:checked').map(function()
            {
                return $(this).val();
            }).get();
            var url = "<?= Yii::$app->homeUrl ?>?r=send-message/selected&body="+body
                +"&selection="+array;
            window.location = url;
        }

    });
</script>