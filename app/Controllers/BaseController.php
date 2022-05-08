<?php


namespace App\Controllers;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class BaseController
{
    protected ServerRequestInterface $request;
    protected RequestHandlerInterface $handler;
    protected ResponseInterface $response;

    public function __construct(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        $this->response = $handler->handle($request);
        $this->request = $request;
        $this->handler = $handler;
    }
}