<?php

namespace App\Middleware;

use App\Support\Router\RouterInterface;
use Laminas\Diactoros\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    private RouterInterface $router;
    private ContainerInterface $container;

    public function __construct(RouterInterface $router, ContainerInterface $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $httpMethod = $request->getMethod();

        $uri = $request->getUri()->getPath();

        $route = $this->router->withRoute($httpMethod, $uri)->dispatch();

        if ($this->router->isFoundRoute($route))
        {
            return $route->getResponseAction($request, $handler, $this->container);
        }

        return (new Response())->withStatus(404, 'Not Found');
    }
}