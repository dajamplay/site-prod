<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\RouteMiddleware;
use App\Middleware\TestMiddleware;

return [
    [AuthMiddleware::class],
    [TestMiddleware::class],
    [RouteMiddleware::class]
];