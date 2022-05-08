<?php

namespace App\Services\Router;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

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

    public function getResponseAction(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $parameters = $this->parameters;
        $class = $this->class;
        $method = $this->method;
        return (new $class($request, $handler))->$method($parameters);
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}