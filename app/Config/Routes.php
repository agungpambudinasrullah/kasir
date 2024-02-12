<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/dashboard', 'Home::index');
$routes->get('/', 'HomeController::index');
$routes->post('/order', 'HomeController::order');
$routes->get('/order', 'HomeController::order');
$routes->get('/menu', 'MenuController::index');
$routes->post('/order', 'MenuController::order');


//produk
$routes->get('/produk','Produk::index');
$routes->get('/produk/tampil', 'Produk::ambilSemua');
$routes->post('/produk/simpan', 'Produk::Simpan');
$routes->get('/produk/edit', 'Produk::edit');
$routes->post('/produk', 'Produk::Simpan');
$routes->post('/produk/update', 'Produk::update');
$routes->post('/produk/delete', 'Produk::delete');
$routes->get('/login', 'Login::login');
$routes->get('/logout', 'AuthController::logout');

//pelanggan
$routes->get('/pelanggan', 'Pelanggan::index');
$routes->get('/pelanggan/tampil', 'Pelanggan::ambilSemua');
$routes->post('/pelanggan/simpan', 'Pelanggan::Simpan');
$routes->get('/pelanggan/edit', 'Pelanggan::edit');
$routes->get('/pelanggan/imputPesanan', 'Pelanggan::inputPesanan');
$routes->post('/pelanggan/update', 'Pelanggan::update');
$routes->post('/pelanggan/delete', 'Pelanggan::delete');
$routes->get('/login', 'Login::login');
$routes->get('/logout', 'AuthController::logout');

//user
$routes->get('/user', 'User::index');
$routes->get('/user/tampil', 'User::ambilSemua');
$routes->post('/user/simpan', 'User::Simpan');
$routes->get('/user/edit', 'User::edit');
$routes->get('/user/imputPesanan', 'User::inputPesanan');
$routes->post('/user/update', 'User::update');
$routes->post('/user/delete', 'User::delete');