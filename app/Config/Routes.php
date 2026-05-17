<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/consultation', 'HomeController::consultation');
$routes->get('/dataset', 'HomeController::dataset');
$routes->get('/compare', 'HomeController::compare');
$routes->post('/recommend', 'HomeController::recommend');
