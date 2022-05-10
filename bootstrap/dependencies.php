<?php

use App\Support\Router\RouterInterface;
use App\Support\TemplateEngine\Blade;
use App\Support\Router\FastRouteDispatcher;
use App\Support\Router\Router;
use App\Support\TemplateEngine\TemplateInterface;
use DI\Container;
use function DI\factory;

$container = new Container();

    $container->set(RouterInterface::class, DI\autowire(Router::class));
    $container->set(TemplateInterface::class, DI\autowire(Blade::class));

    $container->set(FastRouteDispatcher::class, factory(function () {
        return new FastRouteDispatcher(routes_path('web.php'));
    }));

return $container;