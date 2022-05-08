<?php

namespace Services\Router;

use App\Services\Router\FastRouteDispatcher;
use App\Services\Router\Router;
use FastRoute\Dispatcher;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    public function testFoundRoute()
    {
        $router = new Router(new FastRouteDispatcher(__DIR__ . '/../../../routes/web.php'));
        $route = $router->withRoute('GET', '/')->dispatch();
        self::assertEquals(Dispatcher::FOUND, $route->getStatus());
    }

    public function testNotFoundRoute()
    {
        $router = new Router(new FastRouteDispatcher(__DIR__ . '/../../../routes/web.php'));
        $route = $router->withRoute('GET', '/NOTASDASD')->dispatch();
        self::assertEquals(Dispatcher::NOT_FOUND, $route->getStatus());
    }
}