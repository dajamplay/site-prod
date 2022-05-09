<?php

namespace App\Support\Router;

class Route
{
    private array|null $parameters;
    private string|null $class;
    private string|null $method;
    private int $status;

    public function __construct($route)
    {
        $this->status = $route[0];
        $this->parameters = $route[2] ?? null;
        $this->class = $route[1][0] ?? null;
        $this->method = $route[1][1] ?? null;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getMethod(): mixed
    {
        return $this->method;
    }

    public function getClass(): mixed
    {
        return $this->class;
    }

    public function getParameters(): mixed
    {
        return $this->parameters;
    }
}