<?php

namespace App\Services\Router;

interface RouterInterface
{
    public function withRoute(string $httpMethod, string $uri): self;
    public function dispatch(): Route;
    public function isFoundRoute(Route $route): bool;
}