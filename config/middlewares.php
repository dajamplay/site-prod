<?php

use App\Middleware\ActionHandlerMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\HtmlRenderMiddleware;
use App\Middleware\JsonRenderMiddleware;
use App\Middleware\RouteMiddleware;

return [
    [RouteMiddleware::class],
    [AuthMiddleware::class, '/admin1'],
    [ActionHandlerMiddleware::class],
    [JsonRenderMiddleware::class, '/api'],
    [HtmlRenderMiddleware::class],
];