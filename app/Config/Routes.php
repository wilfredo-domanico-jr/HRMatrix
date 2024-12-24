<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/************* AUTHENTICATION GROUP ********************/

$routes->GET('/', 'SigninController::index');
$routes->GET('/signup', 'SignupController::index');
$routes->match(['GET', 'POST'], 'SignupController/store', 'SignupController::store');
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


/************* ADMIN MODULE GROUP ********************/

    /************* USERS GROUP ********************/
    $routes->GET('/users', 'Admin\UsersController::index',['filter' => 'authGuard']);
    $routes->POST('/users/delete/(:any)', 'Admin\UsersController::delete/$1',['filter' => 'authGuard']);
    $routes->GET('/users/create', 'Admin\UsersController::create',['filter' => 'authGuard']);
    $routes->POST('/users/store', 'Admin\UsersController::store',['filter' => 'authGuard']);
    $routes->GET('/users/show/(:any)', 'Admin\UsersController::show/$1',['filter' => 'authGuard']);
    $routes->POST('/users/update/(:any)', 'Admin\UsersController::update/$1',['filter' => 'authGuard']);

    /************* ROLES GROUP ********************/
    $routes->GET('/roles', 'Admin\RoleController::index',['filter' => 'authGuard']);
    $routes->POST('/roles/delete/(:any)', 'Admin\RoleController::delete/$1',['filter' => 'authGuard']);
    $routes->GET('/roles/create', 'Admin\RoleController::create',['filter' => 'authGuard']);
    $routes->POST('/roles/store', 'Admin\RoleController::store',['filter' => 'authGuard']);
    $routes->GET('/roles/show/(:any)', 'Admin\RoleController::show/$1',['filter' => 'authGuard']);
    $routes->POST('/roles/update/(:any)', 'Admin\RoleController::update/$1',['filter' => 'authGuard']);