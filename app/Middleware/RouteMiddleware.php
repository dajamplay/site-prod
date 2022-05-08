<?php

namespace App\Middleware;

use App\Services\Router\RouterInterface;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $httpMethod = $request->getMethod();

        $uri = $request->getUri()->getPath();

        $route = $this->router->withRoute($httpMethod, $uri)->dispatch();

        if ($this->router->isFoundRoute($route))
        {
            return $route->getResponseAction($request, $handler);
        }

        return (new Response())->withStatus(404, 'Not Found');
    }
}