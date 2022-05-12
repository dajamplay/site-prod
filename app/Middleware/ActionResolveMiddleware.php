<?php

namespace App\Middleware;

use App\Support\RequestAttributes\RequestAttr;
use App\Support\Router\ActionResolver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ActionResolveMiddleware implements MiddlewareInterface
{
    private ActionResolver $resolver;

    public function __construct(ActionResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $route = $request->getAttribute(RouteMiddleware::ROUTE);

        $requestAttrActionData = $this->resolver->resolve($request, $route);

        return $handler->handle($request->withAttribute(RequestAttr::ACTION_DATA, $requestAttrActionData));
    }
}