<?php

namespace App\Middleware;

use App\Support\Router\ActionResolver;
use App\Support\Router\RouterInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    private RouterInterface $router;
    private ActionResolver $resolver;

    public function __construct(RouterInterface $router, ActionResolver $resolver)
    {
        $this->router = $router;
        $this->resolver = $resolver;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $httpMethod = $request->getMethod();

        $uri = $request->getUri()->getPath();

        if ($route = $this->router->dispatch($httpMethod, $uri))
        {
            return $this->resolver->resolve($request, $handler, $route);
        }

        return $handler->handle($request);
    }
}