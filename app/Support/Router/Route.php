<?php

namespace App\Support\Router;

class Route
{
    private array|null $parameters;
    private string|null $class;
    private int $status;

    public function __construct($route)
    {
        $this->status = $route[0];
        $this->parameters = $route[2] ?? null;
        $this->class = $route[1][0] ?? null;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getClassName(): mixed
    {
        return $this->class;
    }

    public function getParameters(): mixed
    {
        return $this->parameters;
    }
}