<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'login']);
$routes->group('auth', function ($routes) {
    $routes->post('login', 'Auth::proses');
    $routes->get('lupa-password', 'Auth::lupaPassword', ['as' => 'lupa-password']);
    $routes->post('lupa-password', 'Auth::lupaPassword');
    $routes->get('reset', 'Auth::reset', ['as' => 'reset']);
    $routes->post('ganti-password', 'Auth::gantiPassword', ['as' => 'ganti-password']);


});
$routes->group('', ['filter' => 'login'], function($routes){
    // Mahasiswa
    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('mahasiswa', 'MahasiswaController::index');
    $routes->add('mahasiswa', 'MahasiswaController::create');
    $routes->add('mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1');
    $routes->get('mahasiswa/delete/(:segment)', 'MahasiswaController::delete/$1'); 
    
    // Validasi
    $routes->get('validasi', 'ValidasiController::index');
    $routes->add('validasi/edit/(:segment)', 'ValidasiController::edit/$1');

    $routes->get('tugasakhir', 'TugasAkhirController::index');
    $routes->get('tugasakhir/upload/', 'TugasAkhirController::create');
    $routes->add('tugasakhir/save/', 'TugasAkhirController::save');
    $routes->add('tugasakhir/download/(:segment)', 'TugasAkhirController::download/$1');
    $routes->add('tugasakhir/downloadfile/(:segment)', 'TugasAkhirController::downloadfile/$1');

});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
