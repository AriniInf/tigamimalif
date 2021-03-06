<?php

$namespace =  'Phalcon\Init\Dashboard\Controllers\Web';

$router->addGet('/register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'User',
    'action' => 'register'
]);

$router->addPost('/register', [
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

$router->addGet('/karyawan/list-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'listKategori'
]);

$router->addGet('/karyawan/form-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'formKategori'
]);
$router->addPost('/karyawan/add-kategori', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'addKategori'
]);

$router->addGet('/admin/list-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listKaryawan'
]);

$router->addGet('/karyawan/list-karyawan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
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

$router->addGet('/karyawan/list-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'listProduk'
]);

$router->addPost('/karyawan/add-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'addProduk'
]);


$router->addPost('/karyawan/edit-produk', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'editProduk'
]);

$router->addGet('/karyawan/delete-produk/{id}', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'deleteProduk'
]);

$router->addGet('/admin/list-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listPembelian'
]);

$router->addPost('/admin/add-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'addPembelian'
]);

$router->addPost('/admin/edit-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'editPembelian'
]);

$router->addGet('/karyawan/list-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'listPembelian'
]);

$router->addPost('/karyawan/add-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'addPembelian'
]);

$router->addPost('/karyawan/edit-pembelian', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'editPembelian'
]);

$router->addGet('/admin/list-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'listPenjualan'
]);

$router->addPost('/admin/add-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'addPenjualan'
]);

$router->addPost('/admin/edit-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'editPenjualan'
]);


$router->addGet('/karyawan/list-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'listPenjualan'
]);

$router->addPost('/karyawan/add-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'addPenjualan'
]);

$router->addPost('/karyawan/edit-penjualan', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'editPenjualan'
]);

$router->addGet('/admin/edit-profile', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'editProfile'
]);

$router->addGet('/admin/lihat-profil', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'profil'
]);

$router->addGet('/karyawan/edit-profile', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'editProfile'
]);

$router->addGet('/karyawan/lihat-profil', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'profil'
]);

$router->addPost('/admin/update-profile', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Admin',
    'action' => 'updateProfile'
]);

$router->addPost('/karyawan/update-profile', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'Karyawan',
    'action' => 'updateProfile'
]);


return $router;