<?php
/* @var $this yii\web\View */

use app\models\Gorooh;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;


    $this->title = 'خبر ' . $model->g_id.': '.$model->titr;
    $this->params['breadcrumbs'][] = ['label' => 'اخبار', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->g_id, 'url' => ['view', 'id' => $model->g_id]];
    $this->params['breadcrumbs'][] = 'ویرایش';
    ?>
    <div class="khabar-update">

    <h1><?= Html::encode($this->title) ?></h1>
<?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-12">
            <!-- /.box -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">انتخاب عکس های اسلایدر</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'File1')->fileInput()->label('عکس 1') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'Description1')->textInput()->label('توضیحات') ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'File2')->fileInput()->label('عکس 2') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'Description2')->textInput()->label('توضیحات') ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'File3')->fileInput()->label('عکس 3') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'Description3')->textInput()->label('توضیحات') ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?= $form->field($model, 'File4')->fileInput()->label('عکس 4') ?>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'Description4')->textInput()->label('توضیحات') ?>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'File5')->fileInput()->label('عکس 5') ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'Description5')->textInput()->label('توضیحات') ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'File6')->fileInput()->label('عکس 6') ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'Description6')->textInput()->label('توضیحات') ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'File7')->fileInput()->label('عکس 7') ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'Description7')->textInput()->label('توضیحات') ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'File8')->fileInput()->label('عکس 8') ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'Description8')->textInput()->label('توضیحات') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'File9')->fileInput()->label('عکس 9') ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'Description9')->textInput()->label('توضیحات') ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?= $form->field($model, 'File10')->fileInput()->label('عکس 10') ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'Description10')->textInput()->label('توضیحات') ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-12">
            <div align="center">
                <div class="form-group">
                    <?= Html::submitButton('ثبت خبر', ['class' => 'btn btn-success btn-lg']) ?>
                </div>
            </div>
        </div>

    </div>
<?php ActiveForm::end(); ?>