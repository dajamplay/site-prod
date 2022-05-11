<?php

use App\Middleware\ActionResolveMiddleware;
use App\Middleware\AuthMiddleware;
use App\Middleware\HtmlRenderMiddleware;
use App\Middleware\JsonRenderMiddleware;
use App\Middleware\RouteMiddleware;

return [
    [RouteMiddleware::class],
    [AuthMiddleware::class],
    [ActionResolveMiddleware::class],
    [JsonRenderMiddleware::class, '/api'],
    [HtmlRenderMiddleware::class],
];