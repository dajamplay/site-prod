<?php

namespace App\Middleware;

use App\Services\RouteBuilderInterface;
use FastRoute;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    private RouteBuilderInterface $routeBuilder;

    public function __construct(RouteBuilderInterface $routeBuilder)
    {
        $this->routeBuilder = $routeBuilder;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        $method = $request->getMethod();
        $path = $request->getUri()->getPath();
        $route = $this->routeBuilder->withRoute($method, $path)->dispatch();

        switch ($route[0]) {
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            case FastRoute\Dispatcher::NOT_FOUND:
                return (new Response())->withStatus(404, 'Not Found');
            case FastRoute\Dispatcher::FOUND:
                $parameters = $route[2];
                $class = $route[1][0];
                $method = $route[1][1];
                if (!class_exists($class)) return $handler->handle($request);
                try {
                    return (new $class($request, $handler))->$method($parameters);
                } catch (\Exception $e) {
                    var_dump($e);
                }
            }
        return $handler->handle($request);
    }
}