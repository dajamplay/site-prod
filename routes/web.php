<?php


/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */
$router->get('/', [\App\Http\Actions\Public\Home\HomeAction::class]);
$router->get('/category/{id:\d+}', [\App\Http\Actions\Public\Category\ShowCategoryAction::class]);

$router->get('/admin', [\App\Http\Actions\Admin\Home\AdminHomeAction::class]);