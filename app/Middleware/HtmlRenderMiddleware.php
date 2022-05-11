<?php


namespace App\Middleware;


use App\Support\TemplateEngine\Blade;
use App\Support\TemplateEngine\ResponseEnum;
use App\Support\TemplateEngine\TemplateInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HtmlRenderMiddleware implements MiddlewareInterface
{
    private TemplateInterface $blade;

    public function __construct(TemplateInterface $blade)
    {
        $this->blade = $blade;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $data = $request->getAttribute(ResponseEnum::DATA);
        $body = $this->blade->render($request->getAttribute(Blade::TEMPLATE), $data);
        return new HtmlResponse($body, 200);
    }
}