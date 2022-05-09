<?php

use App\Support\Pipeline\Pipeline;
use DI\Container;
use HttpSoft\Emitter\SapiEmitter;
use Laminas\Diactoros\ServerRequestFactory as Request;

/** @var Container $container */
$container = require bootstrap_path('dependencies.php');

$app = new Pipeline($container, config('middlewares'));

$emitter = new SapiEmitter();
$emitter->emit($app->getPipeline()->handle(Request::fromGlobals()));


