<?php

use App\Services\Pipeline\Pipeline;
use DI\Container;
use HttpSoft\Emitter\SapiEmitter;
use Laminas\Diactoros\ServerRequestFactory as Request;

/** @var Container $container */
$container = require __DIR__ . '/../config/dependencies.php';

$app = new Pipeline($container);
$app->loadMiddlewares();

$emitter = new SapiEmitter();
$emitter->emit($app->getPipeline()->handle(Request::fromGlobals()));


