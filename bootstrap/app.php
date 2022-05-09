<?php

use App\Support\Runner\Runner;
use DI\Container;
use HttpSoft\Runner\ServerRequestRunner;
use Laminas\Diactoros\ServerRequestFactory as Request;

/** @var Container $container */
$container = require bootstrap_path('dependencies.php');

$app = new Runner($container, config('middlewares'));

$runner = new ServerRequestRunner($app->getPipeline());
$runner->run(Request::fromGlobals());

