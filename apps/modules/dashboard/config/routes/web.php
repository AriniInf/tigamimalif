<?php

$namespace =  'Phalcon\Init\Dashboard\Controllers\Web';

$router->addGet('/register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'User',
    'action' => 'register'
]);

$router->addPost('/store-register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'User',
    'action' => 'store'
]);

$router->addPost('/postlogin', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'User',
    'action' => 'postlogin'
]);

$router->addGet('/logout', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'User',
    'action' => 'logout'
]);


$router->addGet('/karyawan/dashboard', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'dashboard'
]);

$router->addGet('/admin/dashboard', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'dashboard'
]);

$router->addPost('/admin/edit-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'editKaryawan'
]);

$router->addPost('/admin/verifikasi-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'verifikasiKaryawan'
]);

$router->addGet('/admin/delete-karyawan/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'deleteKaryawan'
]);


$router->addGet('/admin/list-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listKategori'
]);

$router->addGet('/admin/form-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'formKategori'
]);
$router->addPost('/admin/add-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'addKategori'
]);

$router->addGet('/admin/list-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listKaryawan'
]);

$router->addGet('/admin/list-belum-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listBelumKaryawan'
]);

$router->addGet('/admin/update-karyawan/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'updateKaryawan'
]);


$router->addGet('/admin/form-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'formProduk'
]);

$router->addGet('/admin/list-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listProduk'
]);

$router->addPost('/admin/add-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'addProduk'
]);


$router->addPost('/admin/edit-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'editProduk'
]);

$router->addGet('/admin/delete-produk/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'deleteProduk'
]);

$router->addGet('/admin/list-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Transaksi',
    'action' => 'listPembelian'
]);

$router->addPost('/admin/add-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Transaksi',
    'action' => 'addPembelian'
]);

$router->addPost('/admin/edit-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Transaksi',
    'action' => 'editPembelian'
]);

$router->addGet('/admin/list-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Transaksi',
    'action' => 'listPenjualan'
]);

$router->addPost('/admin/add-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Transaksi',
    'action' => 'addPenjualan'
]);

$router->addPost('/admin/edit-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Transaksi',
    'action' => 'editPenjualan'
]);

$router->addGet('/admin/edit-profile/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'editProfile'
]);

$router->addPost('/admin/update-profile', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'updateProfile'
]);


return $router;