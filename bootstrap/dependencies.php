<?php

use App\Middleware\RouteMiddleware;
use App\Middleware\SenderControllerMiddleware;
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
    return new RouteMiddleware($container->get(Router::class));
}));

$container->set(FastRouteDispatcher::class, factory(function () {
    return new FastRouteDispatcher(routes_path('web.php'));
}));


/** Action Resolver */

$container->set(ActionResolver::class, factory(function (ContainerInterface $container) {
    return new ActionResolver($container->get(Blade::class));
}));

/** Sender Controller Middleware */

$container->set(SenderControllerMiddleware::class, factory(function (ContainerInterface $container) {
    return new SenderControllerMiddleware($container->get(Blade::class));
}));

return $container;