<?php

$config = [
    'id' => 'web',
    'defaultRoute' => 'content/default/index',
    'on afterRequest' => function () {
        /**
         * see. https://content-security-policy.com/
         */
        Yii::$app->getResponse()->getHeaders()->add('Content-Security-Policy',
            'default-src \'none\'; script-src \'self\' \'unsafe-inline\'; connect-src \'self\'; child-src self; frame-src gisp.gov.ru *.gisp.gov.ru etpgpb.ru *.etpgpb.ru self;  img-src * data:; style-src * \'unsafe-inline\'; font-src *;');
    },
    'modules' => [
        'content' => [
            'viewPath' => '@app/modules/content/views/frontend',
            'controllerNamespace' => 'krok\content\controllers\frontend',
        ],
        'news' => [
            'class' => 'app\modules\news\Module',
            'viewPath' => '@app/modules/news/views/frontend',
            'controllerNamespace' => 'app\modules\news\controllers\frontend',
        ],
    ],
    'components' => [
        'urlManager' => [
            'class' => \yii\di\ServiceLocator::class,
            'components' => [
                'default' => require(__DIR__ . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'urlManager.php'),
                'backend' => require(__DIR__ . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'urlManager.php'),
            ],
        ],
        'assetManager' => [
            'class' => \yii\web\AssetManager::class,
            'appendTimestamp' => true,
            'baseUrl' => (getenv('YII_LOCAL') ? '@web/assets' : '@web/ns-stroyka/assets'),
            'dirMode' => 0755,
            'fileMode' => 0644,
            'bundles' => [
                \yii\web\JqueryAsset::class => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js',
                    ],
                ],
                \yii\bootstrap\BootstrapAsset::class => [
                    'sourcePath' => null,
                    'css' => [
                        (getenv('YII_LOCAL') ? '/static/stroy/css/bootstrap.css' : '/ns-stroyka/static/stroy/css/bootstrap.min.css'),
                    ],
                ],
                \yii\bootstrap\BootstrapPluginAsset::class => [
                    'sourcePath' => null,
                    'js' => [
                        getenv('YII_LOCAL') ? '/static/stroy/js/bootstrap.js' : '/ns-stroyka/static/stroy/js/bootstrap.min.js',
                    ],
                ],
            ],
        ],
        'request' => [
            'class' => \krok\language\Request::class,
            'cookieValidationKey' => getenv('YII_COOKIE_VALIDATION_KEY'),
        ],
        'errorHandler' => [
            'class' => \krok\sentry\web\SentryErrorHandler::class,
            'errorAction' => 'content/default/error',
            'sentry' => \krok\sentry\Sentry::class,
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => \yii\debug\Module::class,
        'panels' => [
            'config' => false,
            'request' => [
                'class' => \yii\debug\panels\RequestPanel::class,
                'displayVars' => ['_GET', '_POST', '_COOKIE', '_SESSION', '_FILES'],
            ],
            'log' => [
                'class' => \yii\debug\panels\LogPanel::class,
            ],
            'profiling' => [
                'class' => \yii\debug\panels\ProfilingPanel::class,
            ],
            'db' => [
                'class' => \yii\debug\panels\DbPanel::class,
            ],
            'assets' => [
                'class' => \yii\debug\panels\AssetPanel::class,
            ],
            'mail' => [
                'class' => \yii\debug\panels\MailPanel::class,
            ],
            'timeline' => [
                'class' => \yii\debug\panels\TimelinePanel::class,
            ],
            'user' => [
                'class' => \yii\debug\panels\UserPanel::class,
                'ruleUserSwitch' => [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
            'router' => [
                'class' => \yii\debug\panels\RouterPanel::class,
            ],
            'queue' => [
                'class' => \yii\queue\debug\Panel::class,
            ],
        ],
        'allowedIPs' => [
            '*',
        ],
    ];
}

return \yii\helpers\ArrayHelper::merge(require(__DIR__ . DIRECTORY_SEPARATOR . 'common.php'), $config);
