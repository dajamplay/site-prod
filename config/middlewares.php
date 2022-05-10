<?php

use App\Middleware\ActionResolveMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\RouteMiddleware;
use App\Middleware\SenderControllerMiddleware;

return [
    [RouteMiddleware::class],
    [AuthMiddleware::class],
    [ActionResolveMiddleware::class],
    [SenderControllerMiddleware::class]
];