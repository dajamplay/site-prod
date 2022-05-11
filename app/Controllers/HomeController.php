<?php

namespace App\Controllers;

use App\Services\TestService;
use App\Support\TemplateEngine\ResponseEnum;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeController
{
    public function __construct()
    {

    }

    public function index(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $request = $request->withAttribute(ResponseEnum::DATA, ['name' => 'Maksim']);
        $request = $request->withAttribute(ResponseEnum::TEMPLATE, 'main.home');
        return $handler->handle($request);
    }

    public function admin(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return $handler->handle($request);
    }
}