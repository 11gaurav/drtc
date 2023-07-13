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
$routes->get('/', 'Frontend::index');

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
 
//  FRONTEND
$routes->get('networkMap','Frontend/Frontend::networkMap');
$routes->get('partnerUs','Frontend/Frontend::partnerUs');
$routes->get('associateUs','Frontend/Frontend::associateUs');
$routes->get('attachVehicle','Frontend/Frontend::attachVehicle');
$routes->get('career','Frontend/Frontend::career');
$routes->get('career','Frontend/Home::career');
$routes->get('contactUs','Frontend/Home::contactUs');
$routes->get('requestcall','Frontend/Home::RequestCallBack');
$routes->get('pickuprequestSubmit','Frontend/Home::Peckup_Request_Form');
$routes->get('message','Frontend/Home::Message');
$routes->get('associate','Frontend/Home::AssociateUs');
$routes->get('associateVehicle','Frontend/Home::AssociateVehicle');
$routes->get('drtc','Frontend/Frontend::index');
$routes->get('aboutUs','Frontend/Frontend::aboutUs');
$routes->get('our_services','Frontend/Frontend::our_services');
$routes->get('customerCare','Frontend/Frontend::customer_care');
$routes->get('timeAndDistance','Frontend/Frontend::timeAndDistance');
$routes->get('pickupRequest','Frontend/Frontend::pickupRequest');
$routes->get('home','Frontend');
$routes->get('getbranch','Frontend/Frontend::get_branch_array_from_state');

//BACKEND ROUTES

$routes->get('admin','Backend/admin/AdminDashboard::index');
$routes->get('login','Backend/admin/AdminLoginController::showLoginForm');
$routes->get('logout','Backend/admin/AdminLogoutController::logout');
$routes->get('Registration','Backend/admin/AdminLoginController::index');
$routes->get('registration','Backend/admin/AdminLoginController::register_user');
$routes->get('request','Backend/admin/Home::Request');
$routes->get('Message','Backend/admin/Home::Message_Request');
$routes->get('peckup','Backend/admin/Home::Pickup_Request');
$routes->get('AssociateUs','Backend/admin/Home::AssociateUs');
$routes->get('AssociateVehicle','Backend/admin/Home::AssociateVehicle');


