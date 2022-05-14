<?php

namespace App\Support\ActionHandler;

use App\Middleware\RouteMiddleware;
use App\Support\Router\Route;
use DI\Container;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ActionHandler
{
    private ContainerInterface $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function handle(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var Route $route */
        $route = $request->getAttribute(RouteMiddleware::ROUTE);

        $actionClassName = $route->getClassName();

        /** Action __construct with request and next middleware*/
        $instantAction = $this->container->make($actionClassName, ['request' => $request , 'handler' => $handler]);

        $parameters = $route->getParameters();

        /** Action __invoke with parameters */
        return $this->container->call($instantAction, $parameters);
    }
}