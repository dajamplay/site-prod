<?php

namespace App\Support\Router;

class Router implements RouterInterface
{
    private FastRouteDispatcher $dispatcher;

    public function __construct(FastRouteDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function dispatch(string $httpMethod, string $uri): Route|false
    {
        $route = new Route($this->dispatcher->dispatch($httpMethod, $uri));

        return $this->dispatcher->isFoundRoute($route) ? $route : false;
    }
}