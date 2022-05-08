<?php

use App\Middleware\RouteMiddleware;
use App\Services\Router\FastRouteDispatcher;
use App\Services\Router\Router;
use DI\Container;
use Psr\Container\ContainerInterface;
use function DI\factory;

$container = new Container();

/** Routing */

$container->set(RouteMiddleware::class, factory(function (ContainerInterface $container) {
    return new RouteMiddleware($container->get(Router::class));
}));

$container->set(Router::class, factory(function (ContainerInterface $container) {
    return new Router($container->get(FastRouteDispatcher::class));
}));

$container->set(FastRouteDispatcher::class, factory(function () {
    return new FastRouteDispatcher(__DIR__ . '/../routes/web.php');
}));

return $container;