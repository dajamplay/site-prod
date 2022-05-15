<?php

use App\Middleware\ActionHandlerMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\HtmlRenderMiddleware;
use App\Middleware\JsonRenderMiddleware;
use App\Middleware\RouteMiddleware;

return [
    [RouteMiddleware::class],
    [AuthMiddleware::class, '/admin'],
    [ActionHandlerMiddleware::class],
    [JsonRenderMiddleware::class, '/api'],
    [HtmlRenderMiddleware::class],
];