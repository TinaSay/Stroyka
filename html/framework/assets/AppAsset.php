<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';

    /**
     * @var string
     */
    public $baseUrl = '@web/ns-stroyka';

    /**
     * @var array
     */
    public $css = [
        'static/stroy/css/icon.css',
        'static/stroy/css/bootstrap-datetimepicker.css',
        'static/stroy/css/select2.css',
        'static/stroy/css/slick.css',
        'static/stroy/css/main.css',
        'static/stroy/css/site.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'static/stroy/js/moment-with-locales.min.js',
        'static/stroy/js/bootstrap-datetimepicker.min.js',
        'static/stroy/js/select2.full.js',
        'static/stroy/js/jquery.rating.js',
        'static/stroy/js/masonry.pkgd.min.js',
        'static/stroy/js/main.js',
        'static/stroy/js/site.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        YiiAsset::class,

    ];


    public function __construct(array $config = [])
    {
        $this->baseUrl = (getenv('YII_LOCAL') ? '@web' : '@web/ns-stroyka');
        parent::__construct($config);
    }
}
