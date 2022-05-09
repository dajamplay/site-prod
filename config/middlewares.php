<?php

use App\Middleware\ActionResolveMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\RouteMiddleware;

return [
    [RouteMiddleware::class],
    [AuthMiddleware::class],
    [ActionResolveMiddleware::class]
];