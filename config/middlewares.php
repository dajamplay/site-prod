<?php

use App\Middleware\ActionHandlerMiddleware;
use App\Middleware\AuthAdminMiddleware;
use App\Middleware\HtmlRenderMiddleware;
use App\Middleware\JsonRenderMiddleware;
use App\Middleware\RouteMiddleware;

return [
    [RouteMiddleware::class],
    [AuthAdminMiddleware::class, '/admin'],
    [ActionHandlerMiddleware::class],
    [JsonRenderMiddleware::class, '/api'],
    [HtmlRenderMiddleware::class],
];