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
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/frontend/bootstrap-theme.css',
        'css/frontend/bootstrap-theme.min.css',
        'css/frontend/coming-soon-social.css',
        'css/frontend/icomoon-social.css',
        'css/frontend/leaflet.css',
        'css/frontend/leaflet.ie.css',
        'css/frontend/main.css',
        //'css/frontend/main-green.css',
        //'css/frontend/main-grey.css',
        //'css/frontend/main-orange.css',
        //'css/frontend/main-red.css',
    ];
    public $js = [
        'scripts/frontend/jquery.bxslider.js',
        'scripts/frontend/jquery.fitvids.js',
        'scripts/frontend/jquery.sequence.js',
        'scripts/frontend/jquery.sequence-min.js',
        'scripts/frontend/main-menu.js',
        'scripts/frontend/modernizr-2.6.2-respond-1.1.0.min.js',
        'scripts/frontend/template.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
