<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Login routes
$routes->get('/', 'AuthController::login');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/registerProcess', 'AuthController::registerProcess');

// Surat Masuk
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('surat_masuk', 'SuratMasuk::index');
$routes->get('surat_masuk/create', 'SuratMasuk::create');
$routes->post('surat_masuk/store', 'SuratMasuk::store');

$routes->get('surat_masuk/edit/(:num)', 'SuratMasuk::edit/$1');
$routes->post('surat_masuk/update/(:num)', 'SuratMasuk::update/$1');

$routes->post('surat_masuk/delete/(:num)', 'SuratMasuk::delete/$1');

// Dashboard - satu endpoint, isi disesuaikan level-nya
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('surat_keluar', 'SuratKeluar::index');
$routes->get('surat_keluar/create', 'SuratKeluar::create');
$routes->post('surat_keluar/store', 'SuratKeluar::store');

$routes->get('surat_keluar/edit/(:num)', 'SuratKeluar::edit/$1');
$routes->post('surat_keluar/update/(:num)', 'SuratKeluar::update/$1');

$routes->post('surat_keluar/delete/(:num)', 'SuratKeluar::delete/$1');