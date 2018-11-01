<?php

$config = [
    'id' => 'console',
    'bootstrap' => [
        'queue',
    ],
    'controllerMap' => [
        // Migrations for the specific project's module
        'migrate' => [
            'class' => \yii\console\controllers\MigrateController::class,
            'migrationTable' => '{{%migration}}',
            'useTablePrefix' => true,
            'interactive' => false,
            'migrationPath' => [
                '@app/migrations',
                '@yii/rbac/migrations',
                '@app/modules/auth/migrations',
                '@vendor/yii2-developer/yii2-storage/migrations',
                '@vendor/yii2-developer/yii2-content/migrations',
                '@vendor/yii2-developer/yii2-configure/migrations',
                '@app/modules/menu/migrations',
                '@vendor/yii2-developer/yii2-menu/migrations',
                '@app/modules/content/migrations',
                '@vendor/contrib/yii2-html/migrations',
                '@app/modules/html/migrations/about',
                '@app/modules/html/migrations/services',
                '@app/modules/html/migrations/finance',
                '@app/modules/html/migrations/calculate',
                '@app/modules/news/migrations',
            ],
        ],
        'access' => [
            'class' => \krok\access\AccessController::class,
            'userIds' => [
                1,
            ],
            'rules' => [
                \app\modules\auth\rbac\AuthorRule::class,
            ],
            'config' => [
                [
                    'name' => 'system',
                    'controllers' => [
                        'default' => [
                            'index',
                            'flush-cache',
                        ],
                    ],
                ],
                [
                    'name' => 'tinymce/uploader',
                    'controllers' => [
                        'default' => [
                            'image',
                            'file',
                        ],
                    ],
                ],
                [
                    'name' => 'auth',
                    'controllers' => [
                        'auth' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                            'refresh-token',
                        ],
                        'log' => ['index'],
                        'social' => ['index'],
                        'profile' => ['index'],
                    ],
                ],
                [
                    'name' => 'content',
                    'controllers' => [
                        'default' => [],
                    ],
                ],
                [
                    'name' => 'backup',
                    'controllers' => [
                        'default' => [
                            'index',
                        ],
                        'make' => [
                            'filesystem',
                            'database',
                        ],
                        'download' => [
                            'filesystem',
                            'database',
                        ],
                    ],
                ],
                [
                    'name' => 'configure',
                    'controllers' => [
                        'default' => [
                            'list',
                            'save',
                        ],
                    ],
                ],
                [
                    'name' => 'menu',
                    'controllers' => [
                        'default' => [
                            'index',
                            'view',
                            'create',
                            'update',
                            'delete',
                            'update-all',
                            'module-menu-items',
                            'delete-image',
                        ],
                    ],
                ],
                [
                    'name' => 'html',
                    'controllers' => [
                        'html' => [
                            'index',
                            'view',
                            'update',
                        ],
                    ],
                ],
                [
                    'name' => 'news',
                    'controllers' => [
                        'manage' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                        ],
                        'news-group' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'modules' => [],
    'components' => [
        'urlManager' => [
            'class' => \yii\di\ServiceLocator::class,
            'components' => [
                'frontend' => require(__DIR__ . DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'urlManager.php'),
                'backend' => require(__DIR__ . DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'urlManager.php'),
            ],
        ],
        'errorHandler' => [
            'class' => \krok\sentry\console\SentryErrorHandler::class,
            'sentry' => \krok\sentry\Sentry::class,
        ],
    ],
];

return \yii\helpers\ArrayHelper::merge(require(__DIR__ . DIRECTORY_SEPARATOR . 'common.php'), $config);
