<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAssetHome extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
        'css/bootstrap.css',
        'css/style.css',
        'css/JiSlider.css',
        'css/font-awesome.css',
        '//fonts.googleapis.com/css?family=Montserrat:400,700',
        '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic',
        'css/swipebox.css',
    ];
    public $js = [
        'js/jquery-2.14.min.js',
        'js/JiSlider.js',
        'js/jarallax.js',
        'js/SmoothScroll.min.js',
        'js/jqBootstrapValidation.js',
        'js/contact_me.js',
        'js/jquery.waypoints.min.js',
        'js/jquery.countup.js',
        'js/move-top.js',
        'js/easing.js',
        'js/jquery.swipebox.min.js',
        'js/bootstrap-3.1.1.min.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
