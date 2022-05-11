<?php

namespace App\Support\Router;

use FastRoute;
use FastRoute\Dispatcher;

class FastRouteDispatcher implements Dispatcher
{
    public function dispatch($httpMethod, $uri): array
    {
        $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {

            $routesFiles = glob(routes_path() . '/*.php');

            foreach ($routesFiles as $routesFile) {
                require_once $routesFile;
            }
        });

        return $dispatcher->dispatch($httpMethod, $uri);
    }

    public function isFoundRoute(Route $route): bool
    {
        return $route->getStatus() === Dispatcher::FOUND || $route->getStatus() === Dispatcher::METHOD_NOT_ALLOWED;
    }
}