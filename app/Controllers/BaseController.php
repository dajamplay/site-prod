<?php

namespace App\Controllers;

use App\Support\TemplateEngine\TemplateInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class BaseController
{
    public function __construct(
        protected ServerRequestInterface $request,
        protected RequestHandlerInterface $handler,
        private TemplateInterface $blade)
    {
    }

    public function render(string $template, array $data = []): ResponseInterface
    {
        return new HtmlResponse($this->blade->render($template, $data), 200);
    }
}