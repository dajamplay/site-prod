<?php

namespace App\Middleware;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use HttpSoft\Emitter\SapiEmitter;


class EmptyMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $request = $request->withAttribute('m', ' :AuthMiddleware attr');
        $response = $handler->handle($request);
        $response->getBody()->write('<br />AuthMiddleware');
        $response = $response->withHeader('X-AuthMiddleware', 'test');
        return $response;
    }
}