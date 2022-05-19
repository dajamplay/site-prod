<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */

/**
 * Public user
 */
$router->get('/', [\App\Actions\Public\Home\Home::class]);
$router->get('/category/{id:\d+}', [\App\Actions\Public\Category\ShowCategory::class]);

/**
 * Administrator
 */
$router->get('/admin/home', [\App\Actions\Admin\Home\Home::class]);
$router->get('/admin-login', [\App\Actions\Admin\Auth\Login::class]);