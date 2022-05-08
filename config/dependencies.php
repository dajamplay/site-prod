<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\ResponseHandler;
use App\Middleware\RouteMiddleware;
use App\Services\Router\FastRouteDispatcher;
use App\Services\Router\Router;
use DI\Container;
use Psr\Container\ContainerInterface;
use function DI\create;
use function DI\factory;

$container = new Container();

/** Routing middleware*/

$container->set(RouteMiddleware::class, factory(function (ContainerInterface $container) {
    return new RouteMiddleware($container->get(Router::class));
}));

$container->set(Router::class, factory(function (ContainerInterface $container) {
    return new Router($container->get(FastRouteDispatcher::class));
}));

$container->set(FastRouteDispatcher::class, factory(function () {
    return new FastRouteDispatcher(__DIR__ . '/../routes/web.php');
}));

/** Auth middleware */

$container->set(AuthMiddleware::class, factory(function () {
    return new AuthMiddleware();
}));

$container->set(ResponseHandler::class, factory(function () {
    return new ResponseHandler();
}));


return $container;