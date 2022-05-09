<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\ResponseHandler;
use App\Middleware\RouteMiddleware;
use App\Support\TemplateEngine\Blade;
use App\Support\Router\FastRouteDispatcher;
use App\Support\Router\Router;
use DI\Container;
use Psr\Container\ContainerInterface;
use function DI\create;
use function DI\factory;

$container = new Container();

/** Routing middleware*/

$container->set(RouteMiddleware::class, factory(function (ContainerInterface $container) {
    return new RouteMiddleware($container->get(Router::class), $container);
}));

$container->set(Router::class, factory(function (ContainerInterface $container) {
    return new Router($container->get(FastRouteDispatcher::class));
}));

$container->set(FastRouteDispatcher::class, factory(function () {
    return new FastRouteDispatcher(routes_path('web.php'));
}));

/** Auth middleware */

$container->set(AuthMiddleware::class, factory(function () {
    return new AuthMiddleware();
}));

$container->set(ResponseHandler::class, factory(function () {
    return new ResponseHandler();
}));

/** Blade */

$container->set(Blade::class, factory(function () {
    return new Blade();
}));

return $container;