<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\ErrorMiddleware;
use App\Middleware\RouteMiddleware;
use App\Support\Router\ActionResolver;
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
    return new RouteMiddleware($container->get(Router::class), $container->get(ActionResolver::class));
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

$container->set(ErrorMiddleware::class, factory(function () {
    return new ErrorMiddleware();
}));

/** Blade */

$container->set(Blade::class, factory(function () {
    return new Blade();
}));

/** Action Resolver */

$container->set(ActionResolver::class, factory(function (ContainerInterface $container) {
    return new ActionResolver($container->get(Blade::class));
}));

return $container;