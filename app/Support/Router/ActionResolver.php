<?php

namespace App\Support\Router;

use App\Support\TemplateEngine\TemplateInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ActionResolver
{
    private TemplateInterface $blade;

    public function __construct(TemplateInterface $blade)
    {
        $this->blade = $blade;
    }

    public function resolve(ServerRequestInterface $request, RequestHandlerInterface $handler, Route $route): ResponseInterface
    {
        $class = $route->getClass();
        $method = $route->getMethod();
        $parameters = $route->getParameters();
        //TODO create class with container
        return (new $class($request, $handler, $this->blade))->$method($parameters);
    }
}