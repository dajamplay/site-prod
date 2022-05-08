<?php

use App\Middleware\RouteMiddleware;
use App\Services\RouteBuilder;
use DI\Container;
use Psr\Container\ContainerInterface;
use function DI\factory;

$container = new Container();

$container->set(RouteMiddleware::class, factory(function (ContainerInterface $container) {
    return new RouteMiddleware($container->get(RouteBuilder::class));
}));

$container->set(RouteBuilder::class, factory(function () {
    return new RouteBuilder(__DIR__ . '/../routes/web.php');
}));

return $container;