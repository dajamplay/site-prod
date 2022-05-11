<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */

$router->get('/home', ['App\Controllers\HomeController', 'index']);
$router->get('/api/home', ['App\Controllers\HomeController', 'index']);
//$router->get('/admin', ['App\Controllers\HomeController', 'admin']);
//$router->get('/api', ['App\Controllers\HomeController', 'index']);
$router->get('/api', ['App\Controllers\HomeAction']);