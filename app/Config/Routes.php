<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/registry', 'Home::registry');
$routes->get('/registry_uploads', 'Home::registry_uploads');
$routes->get('/update/(:segment)','Home::update/$1');
$routes->get('/update_upload/(:segment)','Home::update_upload/$1');
$routes->get('/admin/(:num)','Home::delete/$1');
$routes->get('/login_user', 'Home::login_user');
$routes->get('/register_user', 'Home::register_user');
$routes->get('/login_user', 'Login_user::login_user',['as' => 'login_user']);
$routes->post('/login_user/process', 'Login_user::process');
$routes->get('/logout_user', 'Login_user::logout_user');
$routes->get('/register_user', 'Register_user::register_user');
$routes->post('/register_user/process', 'Register_user::process');


$routes->get('/', 'Home::index_chat');
$routes->match(['get', 'post'], '/main/chat', 'Home::chat');
$routes->get('/getmsg', 'Home::msg');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
