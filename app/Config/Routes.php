<?php

// Routes.php
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Obat\DataObat;
/**
 * @var RouteCollection $routes
 */

// Default Routes
$routes->get('/', 'AuthController::login');
$routes->setDefaultController('Auth');

// Auth Routes
$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/register/store', 'AuthController::store');

// Dashboard Route
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('data-master-obat', 'Obat\DataObat::index');

// Data Master Obat Routes
$routes->group('data-master-obat', ['namespace' => 'App\Controllers\Obat'], function ($routes) {
    $routes->get('', 'DataObat::index');                            // Menampilkan daftar obat
    $routes->get('create', 'DataObat::create');                     // Menampilkan form tambah obat
    $routes->post('simpan', 'DataObat::save');                      // Simpan data obat (POST)
    $routes->get('edit/(:num)', 'DataObat::edit/$1');               // Menampilkan form edit obat
    $routes->match(['put', 'post'], 'update/(:num)', 'DataObat::update/$1'); // Update data obat
    $routes->get('hapus/(:num)', 'DataObat::hapus/$1');

    // Export Routes
    $routes->get('export-excel', 'DataObat::exportExcel');          // Export data obat ke Excel
    $routes->get('export-pdf', 'DataObat::exportPdf');              // Export data obat ke PDF
});