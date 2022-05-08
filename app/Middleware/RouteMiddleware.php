<?php

namespace App\Middleware;

use FastRoute;
use FastRoute\RouteCollector;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ResponseFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
            $r->get('/', ['App\Controllers\HomeController', 'index']);
            $r->get('/admin', ['App\Controllers\HomeController', 'admin']);
        });

        $route = $dispatcher->dispatch($request->getMethod(), $request->getUri()->getPath());
        switch ($route[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                return new Response('php://memory', 404);
                break;
            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                return (new Response())->withStatus(404, 'SSS');
                break;
            case FastRoute\Dispatcher::FOUND:
                $routerHandler = $route[1];
                $parameters = $route[2];
                $class = $routerHandler[0];
                $method = $routerHandler[1];
                if (!class_exists($class)) return $handler->handle($request);
                $obj = new $class($request, $handler);
                if ($method) {
                    return $obj->$method(...$parameters);
                } else {
                    if (method_exists($obj, '__invoke')) {
                        return $obj($request, $handler);
                    } else {
                        return new $class($request, $handler);
                    }
                }
                break;
            }
    }
}