<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('signup', 'AuthController::signup');
$routes->post('signup', 'AuthController::register');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attempt');
$routes->get('logout', 'AuthController::logout');
$routes->get('tasks', 'TaskController::index');
$routes->get('tasks/new', 'TaskController::new');
$routes->post('tasks/create', 'TaskController::create');
$routes->get('users', 'UserController::index');
$routes->get('users/new', 'UserController::new');
$routes->post('users/create', 'UserController::create');
$routes->get('tasks/edit/(:num)', 'TaskController::edit/$1');
$routes->post('tasks/update/(:num)', 'TaskController::update/$1');
$routes->get('tasks/delete/(:num)', 'TaskController::delete/$1');