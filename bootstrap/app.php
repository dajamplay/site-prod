<?php

use App\Support\Pipeline\Pipeline;
use DI\Container;
use HttpSoft\Emitter\SapiEmitter;
use Laminas\Diactoros\ServerRequestFactory as Request;

/** @var Container $container */
$container = require __DIR__ . '/dependencies.php';

$app = new Pipeline($container, __DIR__ . '/../config/middlewares.php');

$emitter = new SapiEmitter();
$emitter->emit($app->getPipeline()->handle(Request::fromGlobals()));


