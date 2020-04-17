<?php

return array(
    'dashboard' => [
        'namespace' => 'Phalcon\Init\Dashboard',
        'webControllerNamespace' => 'Phalcon\Init\Dashboard\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\Dashboard\Controllers\Api',
        'className' => 'Phalcon\Init\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ],

    // 'backoffice' => [
    //     'namespace' => 'Phalcon\Init\BackOffice',
    //     'webControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
    //     'apiControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Api',
    //     'className' => 'Phalcon\Init\BackOffice\Module',
    //     'path' => APP_PATH . '/modules/backoffice/Module.php',
    //     'defaultRouting' => true,
    //     'defaultController' => 'index',
    //     'defaultAction' => 'index'
    // ],

    // 'menu' => [
    //     'namespace' => 'Phalcon\Init\Menu',
    //     'webControllerNamespace' => 'Phalcon\Init\Menu\Controllers\Web',
    //     'apiControllerNamespace' => 'Phalcon\Init\Menu\Controllers\Api',
    //     'className' => 'Phalcon\Init\Menu\Module',
    //     'path' => APP_PATH . '/modules/Menu/Module.php',
    //     'defaultRouting' => true,
    //     'defaultController' => 'index',
    //     'defaultAction' => 'index'
    // ],

);