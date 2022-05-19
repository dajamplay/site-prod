<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */
$router->get('/api/home', [\App\Actions\Public\Home\Home::class]);
$router->get('/api/category/{id:\d+}', [\App\Actions\Public\Category\ShowCategory::class]);