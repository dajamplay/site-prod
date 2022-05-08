<?php

namespace Middleware;

use App\Middleware\RouteMiddleware;
use Laminas\Diactoros\ServerRequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Server\RequestHandlerInterface;

class RouteMiddlewareTest extends TestCase
{
    public function test404()
    {
        $handler = $this->getMockBuilder(RequestHandlerInterface::class)->getMock();

        $request = new ServerRequestFactory();
        $request = $request->createServerRequest('GET', '/not-page?id=1');

        $routeMiddleware = new RouteMiddleware();

        $response = $routeMiddleware->process($request, $handler);

        self::assertEquals(404, $response->getStatusCode());
        self::assertEquals('Not Found', $response->getReasonPhrase());
    }
}