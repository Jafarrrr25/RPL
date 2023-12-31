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
$routes->setAutoRoute(true);
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

// Untuk Mobil 
use App\Controllers\Home;
use App\Controllers\Formulir;
use App\Controllers\Mobil;
use App\Controllers\Login;
use App\Controllers\Supir;

$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
$routes->get('/admin', 'Home::admin');
$routes->get('/about', 'Home::about');
$routes->get('/help', 'Home::help');
$routes->get('/customer', 'Home::cust');
$routes->get('/home', [Login::class, 'home']);
$routes->get('Akun/logout', [Login::class, 'logout']);

$routes->match(['get', 'post'], '/register', [Login::class, 'register']);
$routes->match(['get', 'post'], 'Akun/check', [Login::class, 'check']);
$routes->match(['get', 'post'], 'Akun/formulir/formulir_Sewa', [Formulir::class, 'index']);
$routes->match(['get', 'post'], 'formulir/Sukses', [Formulir::class, 'simpan']);
$routes->match(['get', 'post'], 'Akun/Akun/check', [Login::class, 'check']);
$routes->match(['get', 'post'], '/akun/Akun/check', [Login::class, 'check']);
$routes->match(['get', 'post'], 'Akun/Akun/formulir/formulir_Sewa', [Formulir::class, 'index']);
$routes->match(['get', 'post'], 'mobil/showDataMobil', [Mobil::class, 'showData']);
$routes->match(['get', 'post'], 'mobil/addData', [Mobil::class, 'simpan']);
$routes->match(['get', 'post'], 'mobil/simpan', [Mobil::class, 'simpan']);
$routes->match(['get', 'post'], 'supir/showDataSupir', [Supir::class, 'showData']);
$routes->match(['get', 'post'], 'supir/addData', [Supir::class, 'simpan']);
$routes->match(['get', 'post'], 'supir/simpan', [Supir::class, 'simpan']);
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