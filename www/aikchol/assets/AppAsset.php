<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/font-awesome.min.css',
        'css/style.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/style_2.css',
    ];
    
    public $js = [
        "js/bootstrap.min.js",
        "js/jcycle2.js",
        "js/jquery.cycle2.swipe.min.js",    
        "js/modernizr-2.7.1.min.js",
        "js/jquery.easing.min.js",
        "js/jquery.validate.min.js",
        "js/custom.js",
        "js/slick.min.js",
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
