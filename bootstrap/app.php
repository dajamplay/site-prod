<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\TestMiddleware;
use App\Middleware\RouteMiddleware;
use DI\Container as Container;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\Runner\MiddlewarePipeline;
use HttpSoft\Runner\MiddlewareResolver;
use Laminas\Diactoros\Response as Response;
use Laminas\Diactoros\ServerRequestFactory as Request;
use Psr\Http\Message\ResponseInterface;

$container = new Container();
$request = Request::fromGlobals();
$response = new Response();
$resolver = new MiddlewareResolver();
$pipeline = new MiddlewarePipeline();

$pipeline->pipe($resolver->resolve(AuthMiddleware::class), '/admin');
//$pipeline->pipe($resolver->resolve(TestMiddleware::class));
$pipeline->pipe($resolver->resolve(RouteMiddleware::class));
$pipeline->pipe($resolver->resolve(function (): ResponseInterface {
    $response = new Response();
    $response->getBody()->write('<br />ErrorMiddleware');
    return $response;
}));

$emitter = new SapiEmitter();
$emitter->emit($pipeline->handle($request));


