<?php

use app\models\City;
use app\models\Zone;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;


AppAsset::register($this);

?>


<div class="row">
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> کارکرداپراتورها</h3>
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
            <table class="table table-bordered text-center">
                <tbody>
                <tr>
                    <td >
                    <button type="button" class="btn btn-block btn-primary btn-sm">جستجو</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /.col -->
    <!-- /.box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">تماس ها</h3>
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
            <table class="table table-striped"></table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- /.col -->
</div>



