<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */

/**
 * Public user
 */
$router->get('/', [\App\Http\Actions\Public\Home\HomeAction::class]);
$router->get('/category/{id:\d+}', [\App\Http\Actions\Public\Category\ShowCategoryAction::class]);

/**
 * Administrator
 */
$router->get('/admin/home', [\App\Http\Actions\Admin\Home\AdminHomeAction::class]);
$router->get('/admin-login', [\App\Http\Actions\Admin\Auth\AdminLoginAction::class]);