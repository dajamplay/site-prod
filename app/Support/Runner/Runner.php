<?php

namespace App\Support\Runner;

use HttpSoft\Runner\MiddlewarePipeline;
use Psr\Container\ContainerInterface;

class Runner
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
    }

    public function getPipeline(): MiddlewarePipeline
    {
        return $this->pipeline;
    }
}