<?php

namespace App\Controllers;

use App\Support\Blade\Blade;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class BaseController
{
    protected ServerRequestInterface $request;
    protected RequestHandlerInterface $handler;
    protected ResponseInterface $response;
    private ContainerInterface $container;

    public function __construct(ServerRequestInterface $request, RequestHandlerInterface $handler, ContainerInterface $container)
    {
        $this->response = $handler->handle($request);
        $this->request = $request;
        $this->handler = $handler;
        $this->container = $container;
    }

    public function render(string $template = '', array $data = []): ResponseInterface
    {
        $blade = $this->container->get(Blade::class);
        return $this->response;
    }
}