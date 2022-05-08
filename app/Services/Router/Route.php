<?php

namespace App\Services\Router;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Route
{
    private array $parameters;
    private string $class;
    private string $method;
    private int $status;

    public function __construct($route)
    {
        $this->status = $route[0];
        $this->parameters = $route[2];
        $this->class = $route[1][0];
        $this->method = $route[1][1];
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