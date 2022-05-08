<?php

namespace App\Services;

use FastRoute\Dispatcher;
use FastRoute;

class RouteBuilder implements RouteBuilderInterface
{
    private string $method;
    private string $path;
    private Dispatcher $dispatcher;

    public function __construct($webRoutesPath)
    {
        $this->dispatcher = FastRoute\simpleDispatcher(require_once $webRoutesPath);
    }

    public function withRoute(string $method, string $path): self
    {
        $this->method = $method;
        $this->path = $path;
        return $this;
    }

    public function dispatch(): array
    {
        return $this->dispatcher->dispatch($this->method, $this->path);
    }
}