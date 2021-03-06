<?php

use App\Repositories\EloquentUserRepository;
use App\Repositories\UserRepository;
use App\Support\ActionHandler\ActionHandler;
use App\Support\Router\Router;
use App\Support\Router\RouterInterface;
use App\Support\TemplateEngine\Blade;
use App\Support\TemplateEngine\TemplateInterface;
use DI\Container;
use function DI\autowire;
use function DI\factory;

return [
    RouterInterface::class => autowire(Router::class),
    TemplateInterface::class => autowire(Blade::class),
    UserRepository::class => autowire(EloquentUserRepository::class),
    ActionHandler::class => factory( fn (Container $c) => new ActionHandler($c)),
];