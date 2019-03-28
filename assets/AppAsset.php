<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.rtl.full.min.css',
//        'css/site.css',
        'dist/css/bootstrap-theme.css',
       'dist/css/rtl.css',
       'bower_components/font-awesome/css/font-awesome.min.css',
      'bower_components/Ionicons/css/ionicons.min.css',
      'dist/css/AdminLTE.css',
      'dist/css/skins/_all-skins.min.css',
    ];
    public $js = [
        'dist/js/highcharts.js',
      //  'bower_components/jquery/dist/jquery.min.js',
        'bower_components/jquery-ui/jquery-ui.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/raphael/raphael.min.js',
        'bower_components/morris.js/morris.min.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'bower_components/jquery-knob/dist/jquery.knob.min.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'dist/js/adminlte.min.js',
        'dist/js/pages/dashboard.js',
        'dist/js/demo.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
