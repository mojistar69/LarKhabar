<?php
/* @var $this yii\web\View */

use app\models\City;
use app\models\Cityoperator;
use app\models\Zone;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\models\CitySearch;
use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->

        <!-- /.box -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">مشخصات فردی</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'opnumber')->textInput(['maxlength' => 30,'style'=>'width:200px',
                        'type'=>'number',
                        'placeholder'=>'شماره اپراتور']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => 30,
                        'style'=>'width:200px','placeholder'=>'نام']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'family')->textInput(['maxlength' => 30,
                        'style'=>'width:200px','placeholder'=>'نام خانوادگی']) ?>
                </div>

                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="Operator[sex]"  id="optionsRadios2" value="1">
                            مرد
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="Operator[sex]" checked="true" id="optionsRadios3" value="0" >
                            زن
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'phone')->textInput(['style'=>'width:160px','type'=>'number',
                        'placeholder'=>'07152344744 مثال']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'mobile')->textInput(['style'=>'width:160px','type'=>'number',
                        'placeholder'=>'09332517700 مثال']) ?>
                </div>

                <div class="form-group">
                    <?php
                    $cities = ArrayHelper::map(City::find()->all(), 'id', 'name');
                    ?>
                    <label> &nbsp;&nbsp;شهر</label>
                    <?= Html::dropDownList("Operator[cityid]", null, $cities, ['prompt' => 'انتخاب', 'id' => 'cityId', 'class' => 'form-control','options' => [$model->cityid => ['Selected'=>'selected']]]) ?>
                </div>


            </div>


        </div>
        <!-- Form Element sizes -->

        <!-- /.box -->

    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- Horizontal Form -->

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">اطلاعات کاربری</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <div class="box-body">
                <div class="form-group">
                    <?= $form->field($model, 'user')->textInput(['maxlength' => 30,'style'=>'width:200px'
                    ]) ?>
                </div>

                <div class="form-group">
                        <?= $form->field($model, 'pass')->passwordInput(['maxlength' => 30,'style'=>'width:200px']) ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'activate')->checkbox(); ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'supervisorconfirm')->checkbox(); ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'showcallerid')->checkbox(); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($model, 'showstatistics')->checkbox(); ?>
                </div>


                <?php
                $searchModel = new CitySearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->pagination->pageSize=120;
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => 'شهرهای دردسترس',
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckboxColumn',
                            'checkboxOptions' => function ($citymodel, $key, $index, $widget) {

                                $cityoperator = Cityoperator::find()->where(['opid' =>Yii::$app->request->get('id'),'cityId'=>$citymodel->id])->all();;
                                if(count($cityoperator)>0)
                                    return ['value' => $citymodel['id'],'checked'=>true];
                                else
                                    return ['value' => $citymodel['id']];
                            },
                        ],
                        'name',

                    ],
                ]);
                ?>



            </div>
            <!-- /.box-body -->

        </div>
        <div align="center">
            <?= Html::submitButton(' ذخیره اپراتور', ['class' => 'btn btn-success btn-lg']) ?>
        </div>

        <!-- /.box -->
    </div>
    <!--/.col (right) -->
</div>
<?php ActiveForm::end(); ?>

<script type="text/javascript">
    $( "#citybtn" ).click(function() {
        if($('td > input[type=checkbox]:checked').length == 0) {
            $("#noSelected").modal('show');
        }

        else{
            alert('ok');
            var str=0;
            var array=$('td > input[type=checkbox]:checked').map(function()
            {
                return $(this).val();
            }).get();
            <?php

            ?>


        }

    });
</script>
