<?php

namespace App\Support\Router;

interface RouterInterface
{
    public function dispatch(string $httpMethod, string $uri): Route|false;
}