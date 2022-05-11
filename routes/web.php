<?php


/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */
$router->get('/', [\App\Action\Home\HomeIndexAction::class]);
$router->get('/category/{id:\d+}', [\App\Action\Category\ShowCategoryAction::class]);