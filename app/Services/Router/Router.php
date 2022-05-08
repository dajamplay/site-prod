<?php

namespace App\Services\Router;

use FastRoute\Dispatcher;

class Router implements RouterInterface
{
    private string $httpMethod;
    private string $uri;
    private Dispatcher $dispatcher;

    public function __construct(Dispatcher $dispatcher)
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
        return $route->getStatus() === Dispatcher::FOUND;
    }
}