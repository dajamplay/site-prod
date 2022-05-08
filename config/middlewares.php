<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\RouteMiddleware;

return [
    [AuthMiddleware::class, '/admin'],
    [RouteMiddleware::class]
];