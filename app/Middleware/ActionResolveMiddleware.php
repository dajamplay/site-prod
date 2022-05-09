<?php

namespace App\Middleware;

use App\Support\Router\ActionResolver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ActionResolveMiddleware implements MiddlewareInterface
{
    private ActionResolver $resolver;

    public function __construct(ActionResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $route = $request->getAttribute(RouteMiddleware::ROUTE);
        return $this->resolver->resolve($request, $handler, $route);
    }
}