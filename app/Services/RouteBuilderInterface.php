<?php

namespace App\Services;

interface RouteBuilderInterface
{
    public function withRoute(string $method, string $path): self;
    public function dispatch(): array;
}