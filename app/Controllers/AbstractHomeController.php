<?php

namespace App\Controllers;

use App\Support\TemplateEngine\TemplateInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class AbstractHomeController
{
    public function __construct(
        protected ServerRequestInterface $request,
        protected RequestHandlerInterface $handler,
        private TemplateInterface $templateEngine)
    {
    }

    public function render(string $template, array $data = []): ResponseInterface
    {
        return new HtmlResponse($this->templateEngine->render($template, $data), 200);
    }
}