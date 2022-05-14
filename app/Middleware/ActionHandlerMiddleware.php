<?php

namespace App\Middleware;

use App\Support\ActionHandler\ActionHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ActionHandlerMiddleware implements MiddlewareInterface
{
    private ActionHandler $actionHandler;

    public function __construct(ActionHandler $actionHandler)
    {
        $this->actionHandler = $actionHandler;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $this->actionHandler->handle($request, $handler);
    }
}