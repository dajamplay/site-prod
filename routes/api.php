<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */
$router->get('/api/home', [\App\Action\Home\HomeIndexAction::class]);
$router->get('/api/category/{id:\d+}', [\App\Action\Category\ShowCategoryAction::class]);