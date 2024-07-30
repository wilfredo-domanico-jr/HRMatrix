<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/************* AUTHENTICATION GROUP ********************/

$routes->GET('/', 'SigninController::index');
$routes->GET('/signup', 'SignupController::index');
$routes->match(['GET', 'POST'], '/SignupController/store', 'SignupController::store');
$routes->match(['GET', 'POST'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->GET('/signin', 'SigninController::index');
$routes->GET('/logout', 'SigninController::logout');


/************* HOMEPAGE GROUP ********************/
$routes->GET('/home', 'HomeController::index',['filter' => 'authGuard']);


/************* DEFAULT REQUEST FORM GROUP ********************/
$routes->GET('/request-forms', 'RequestFormController::index',['filter' => 'authGuard']);
$routes->GET('/request-forms/create/(:any)', 'RequestFormController::create/$1',['filter' => ['authGuard','deptGuard']]);
$routes->POST('/request-forms/store/(:any)', 'RequestFormController::store/$1',['filter' => ['authGuard','deptGuard']]);
$routes->GET('/request-forms/show/(:any)', 'RequestFormController::show/$1',['filter' => ['authGuard','deptGuard']]);
$routes->POST('/request-forms/delete/(:any)', 'RequestFormController::delete/$1',['filter' => ['authGuard','deptGuard']]);
$routes->POST('/request-forms/update/(:any)', 'RequestFormController::update/$1',['filter' => ['authGuard','deptGuard']]);