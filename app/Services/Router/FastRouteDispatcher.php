<?php

namespace App\Services\Router;

use FastRoute;
use FastRoute\Dispatcher;

class FastRouteDispatcher implements Dispatcher
{
    private string $routesPath;

    public function __construct(string $routesPath)
    {
        $this->routesPath = $routesPath;
    }

    public function dispatch($httpMethod, $uri): array
    {
        $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
            require_once $this->routesPath;
        });

        return $dispatcher->dispatch($httpMethod, $uri);
    }
}