<?php

namespace App\Middleware;

use App\Support\Router\Route;
use App\Support\Router\RouterInterface;

use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    public const ROUTE = '_route';

    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $httpMethod = $request->getMethod();
        $uri = $request->getUri()->getPath();

        /** @var Route $route */
        if ($route = $this->router->dispatch($httpMethod, $uri))
        {
            $request = $request->withAttribute(self::ROUTE, $route);
            return $handler->handle($request);
        }
        return new EmptyResponse(404);
    }
}