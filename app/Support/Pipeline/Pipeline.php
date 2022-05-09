<?php

namespace App\Support\Pipeline;

use App\Middleware\ResponseHandler;
use HttpSoft\Runner\MiddlewarePipeline;
use HttpSoft\Runner\MiddlewareResolver;
use Psr\Container\ContainerInterface;

class Pipeline
{
    private ContainerInterface $container;
    private MiddlewarePipeline $pipeline;

    public function __construct(ContainerInterface $container, array $middlewares)
    {
        $this->pipeline = new MiddlewarePipeline();
        $this->container = $container;
        $this->loadMiddlewares($middlewares);
    }

    public function loadMiddlewares($middlewares)
    {
        foreach ($middlewares as $middleware)
        {
            $this->pipeline->pipe($this->container->get($middleware[0]), $middleware[1] ?? null);
        }
        $this->pipeline->pipe((new MiddlewareResolver)->resolve($this->container->get(ResponseHandler::class)));
    }

    public function getPipeline(): MiddlewarePipeline
    {
        return $this->pipeline;
    }
}