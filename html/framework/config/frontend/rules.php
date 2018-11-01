<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 09.02.17
 * Time: 16:31
 */

return [
    /**
     * Glide
     */
    'render/<path:[\w\/\.]+>' => 'glide/default/render',
    /**
     * Filesystem
     */
    'attachment/<path:[\w\/\.\-]+>' => 'filesystem/default/attachment',
    /**
     * Content
     */
    '<language:\w+\-\w+>/content/<alias:[\w\-]+>' => 'content/default/index',
    /**
     * Правила из Menu
     */
    [
        'class' => 'elfuvo\menu\rules\MenuUrlRule',
        'pattern' => '<language:\w+\-\w+>/<path:(?!cp\/).+>',
        'route' => '',
    ],

    /**
     * System
     */
    '<language:\w+\-\w+>' => '/',
    '<language:\w+\-\w+>/<module:[\w\-]+>' => '<module>',
    '<language:\w+\-\w+>/<module:[\w\-]+>/<controller:[\w\-]+>' => '<module>/<controller>',
    '<language:\w+\-\w+>/<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>/<p:\d+>/<per:\d+>' => '<module>/<controller>/<action>',
    '<language:\w+\-\w+>/<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>/<id:\d+>' => '<module>/<controller>/<action>',
    '<language:\w+\-\w+>/<module:[\w\-]+>/<controller:[\w\-]+>/<action:[\w\-]+>' => '<module>/<controller>/<action>',
];
