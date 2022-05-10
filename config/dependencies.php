<?php

use App\Support\Router\FastRouteDispatcher;
use App\Support\Router\Router;
use App\Support\Router\RouterInterface;
use App\Support\TemplateEngine\Blade;
use App\Support\TemplateEngine\TemplateInterface;
use function DI\factory;

return [
    RouterInterface::class => DI\autowire(Router::class),
    TemplateInterface::class => DI\autowire(Blade::class),
    FastRouteDispatcher::class => factory( fn () => new FastRouteDispatcher(routes_path('web.php')))
];