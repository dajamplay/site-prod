<?php

use App\Support\PipelineFactory\PipelineFactory;
use App\Support\Session\Session;
use DI\ContainerBuilder;
use HttpSoft\Runner\ServerRequestRunner;
use Laminas\Diactoros\ServerRequestFactory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;

/**
 * Session start
 */
Session::start();

/**
 * PSR 7 Request
 * @var ServerRequestInterface $request
 */
$request = ServerRequestFactory::fromGlobals();

/**
 * PSR 11 Container
 * @var ContainerInterface $container
 */
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(config('dependencies'));
$container = $containerBuilder->build();

/**
 * PSR 15 Middlewares
 * @var MiddlewareInterface[] $middlewares
 */
$middlewares = config('middlewares');

/**
 * Pipeline: PSR 11 Container + PSR 15 Middlewares[] + PSR 7 Request, response
 */
$pipelineFactory = new PipelineFactory($container, $middlewares);
$pipeline = $pipelineFactory->create();

/**
 * Runner: PSR 7 Request and emmit PSR 7 Response
 */
$runner = new ServerRequestRunner($pipeline);
$runner->run($request);

Session::resetFlashMessage();






