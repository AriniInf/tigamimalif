<?php

$namespace =  'Phalcon\Init\Dashboard\Controllers\Web';

$router->addGet('/register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'register'
]);

$router->addGet('/dashboard', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'dashboard'
]);

$router->addGet('/coba', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'coba'
]);
return $router;