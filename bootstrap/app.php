<?php

use App\Support\Runner\Runner;
use DI\ContainerBuilder;
use HttpSoft\Runner\ServerRequestRunner;
use Laminas\Diactoros\ServerRequestFactory as Request;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(config('dependencies'));

try {
    $container = $containerBuilder->build();
    $pipeline = new Runner($container, config('middlewares'));
    $runner = new ServerRequestRunner($pipeline->getPipeline());
    $runner->run(Request::fromGlobals());
} catch (Exception $e) {
    //TODO add error
}






