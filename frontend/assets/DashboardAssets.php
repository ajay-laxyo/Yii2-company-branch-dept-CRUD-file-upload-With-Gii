<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class DashboardAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/all.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/tempusdominus-bootstrap-4.min.css',
        'css/icheck-bootstrap.min.css',
        'css/jqvmap.min.css',
        'css/adminlte.min.css',
        'css/OverlayScrollbars.min.css',
        'css/daterangepicker.css',
        'css/summernote-bs4.css',
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
    ];
    public $js = [
        'plugins/jquery.min.js',
        'plugins/jquery-ui.min.js',
        'plugins/bootstrap.bundle.min.js',
        'plugins/Chart.min.js',
        'plugins/sparkline.js',
        'plugins/jquery.vmap.min.js',
        'plugins/jquery.vmap.usa.js',
        'plugins/jquery.knob.min.js',
        'plugins/moment.min.js',
        'plugins/daterangepicker.js',
        'plugins/tempusdominus-bootstrap-4.min.js',
        'plugins/summernote-bs4.min.js',
        'plugins/jquery.overlayScrollbars.min.js',
        'js/adminlte.js',
        'js/dashboard.js',
        'js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
