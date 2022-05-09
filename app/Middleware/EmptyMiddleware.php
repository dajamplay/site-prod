<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EmptyMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
//        $request = $request->withAttribute('m', ' :AuthMiddleware attr');
//        $response = $handler->handle($request);
//        $response->getBody()->write('<br />AuthMiddleware');
//        $response = $response->withHeader('X-AuthMiddleware', 'test');
        return $handler->handle($request);
    }
}