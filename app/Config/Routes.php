<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Autenticación
$routes->get('signup', 'AuthController::signup');
$routes->post('signup', 'AuthController::register');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attempt');
$routes->get('logout', 'AuthController::logout');

// Tareas
$routes->get('tasks', 'TaskController::index');
$routes->get('tasks/new', 'TaskController::new');
$routes->post('tasks/create', 'TaskController::create');

// Usuarios
$routes->get('users', 'UserController::index');
$routes->get('users/new', 'UserController::new');
$routes->post('users/create', 'UserController::create');