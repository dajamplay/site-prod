<?php

use App\Support\Pipeline\Pipeline;
use DI\Container;
use HttpSoft\Runner\ServerRequestRunner;
use Laminas\Diactoros\ServerRequestFactory as Request;

/** @var Container $container */
$container = require bootstrap_path('dependencies.php');

$app = new Pipeline($container, config('middlewares'));

$runner = new ServerRequestRunner($app->getPipeline());
$runner->run(Request::fromGlobals());

