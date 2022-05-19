<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */

/**
 * Public user
 */
$router->get('/', [\App\Actions\Public\Home\HomeAction::class]);
$router->get('/category/{id:\d+}', [\App\Actions\Public\Category\ShowCategoryAction::class]);

/**
 * Administrator
 */
$router->get('/admin/home', [\App\Actions\Admin\Home\AdminHomeAction::class]);
$router->get('/admin-login', [\App\Actions\Admin\Auth\AdminLoginAction::class]);