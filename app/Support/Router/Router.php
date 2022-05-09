<?php

namespace App\Support\Router;

class Router implements RouterInterface
{
    private string $httpMethod;
    private string $uri;
    private FastRouteDispatcher $dispatcher;

    public function __construct(FastRouteDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function withRoute(string $httpMethod, string $uri): self
    {
        $this->httpMethod = $httpMethod;
        $this->uri = $uri;
        return $this;
    }

    public function dispatch(): Route
    {
        return new Route($this->dispatcher->dispatch($this->httpMethod, $this->uri));
    }

    public function isFoundRoute(Route $route): bool
    {
        return $this->dispatcher->isFoundRoute($route);
    }
}