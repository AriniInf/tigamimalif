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

$router->addPost('/store-register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'store'
]);

$router->addGet('/jabatan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'jabatan'
]);

$router->addPost('/add-jabatan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'addJabatan'
]);

$router->addGet('/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'login'
]);
$router->addPost('/postlogin', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'postlogin'
]);

$router->addGet('/logout', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Dashboard',
    'action' => 'logout'
]);

$router->addGet('/list-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kategori',
    'action' => 'listKategori'
]);

$router->addGet('/form-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kategori',
    'action' => 'formKategori'
]);
$router->addPost('/add-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Kategori',
    'action' => 'addKategori'
]);

$router->addGet('/list-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'listKaryawan'
]);

$router->addGet('/update-karyawan/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'updateKaryawan'
]);

$router->addPost('/edit-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'editKaryawan'
]);

$router->addPost('/verifikasi-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'verifikasiKaryawan'
]);

$router->addGet('/delete-karyawan/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'deleteKaryawan'
]);

$router->addGet('/form-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Produk',
    'action' => 'formProduk'
]);

$router->addGet('/list-produk/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Produk',
    'action' => 'listProduk'
]);

$router->addPost('/add-produk/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Produk',
    'action' => 'addProduk'
]);
return $router;