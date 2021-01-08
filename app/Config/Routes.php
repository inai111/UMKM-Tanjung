<?php

namespace Config;

use App\Models\userModel;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/user', 'Sistem::user');
$routes->post('/user', 'Sistem::user');
$routes->delete('/user/(:num)', 'Sistem::userhapus/$1');

$routes->get('/kas', 'Sistem::kas');
$routes->post('/kas', 'Sistem::kas');

$routes->post('/print', 'Sistem::print');

$routes->delete('/hapuskas/(:num)', 'Sistem::hapuskas/$1');

$routes->get('/pemasukan', 'Sistem::pemasukan');
$routes->post('/pemasukan', 'Sistem::pemasukanDB');

$routes->get('/pengeluaran', 'Sistem::pengeluaran');
$routes->post('/pengeluaran', 'Sistem::pengeluaranDB');

$routes->get('/fotoprofil', 'Sistem::fotoprofil');
$routes->post('/fotoprofil/(:num)', 'Sistem::fotodb/$1');
$routes->delete('/fotoprofil/(:num)', 'Sistem::fotohapus/$1');

$routes->get('/profil', 'Sistem::profil');
$routes->post('/profil/(:num)', 'Sistem::profildb/$1');

$routes->get('/akun', 'Sistem::akun');
$routes->post('/akun/(:num)', 'Sistem::akundb/$1');

$routes->get('/agenda', 'Sistem::agenda');
$routes->post('/agenda', 'Sistem::agenda');
$routes->delete('/agenda/(:num)', 'Sistem::agendahapus/$1');

$routes->get('/agendatambah', 'Sistem::agendatambah');
$routes->post('/agendatambah', 'Sistem::agendatambahdb');

$routes->get('/gambar', 'Sistem::gambar');
$routes->post('/gambar', 'Sistem::gambar');
$routes->delete('/gambar/(:num)', 'Sistem::gambarhapus/$1');

$routes->get('/gambartambah', 'Sistem::gambartambah');
$routes->post('/gambartambah', 'Sistem::gambartambahdb');

$routes->get('/ganti/(:num)/(:num)', 'Sistem::ganti/$1/$2', ['filter' => 'special']);
$routes->get('/sistem/ganti/(:num)/(:num)', 'Sistem::ganti/$1/$2', ['filter' => 'special']);

$routes->get('/keluar', function () {
	session()->destroy();
	return redirect()->to('/');
});



/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
