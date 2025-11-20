<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->setAutoRoute(true);

$routes->get('/', 'User::index');
$routes->get('user', 'User::index');

$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');
$routes->get('user/logout', 'User::logout');

$routes->post('user/add', 'User::add');
$routes->add('user/edit/(:num)', 'User::edit/$1');   // ← ÚNICA para editar
$routes->get('user/delete/(:num)', 'User::delete/$1');

$routes->get('publication', 'Publication::index');
$routes->post('publication/add', 'Publication::add');
$routes->match(['get','post'], 'publication/edit/(:num)', 'Publication::edit/$1');
$routes->get('publication/delete/(:num)', 'Publication::delete/$1');
