<?php

namespace App\Support\Router;

use App\Support\RequestAttributes\RequestAttr;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

class ActionResolver
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function resolve(ServerRequestInterface $request, Route $route): RequestAttr
    {
        $class = $this->container->get($route->getClass());
        $method = $route->getMethod();
        $parameters = $route->getParameters();
        return $class->$method($request, ...$parameters);
    }
}