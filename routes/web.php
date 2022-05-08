<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */

$router->get('/', ['App\Controllers\HomeController', 'index']);
$router->get('/admin', ['App\Controllers\HomeController', 'admin']);
