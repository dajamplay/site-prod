<?php

namespace App\Controllers;

use App\Support\TemplateEngine\TemplateInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class BaseController
{
    protected ResponseInterface $response;

    public function __construct(
        protected ServerRequestInterface $request,
        protected RequestHandlerInterface $handler,
        private TemplateInterface $blade)
    {
        $this->response = $handler->handle($request);
    }

    public function render(string $template, array $data = []): ResponseInterface
    {
        $this->setResponseBody($this->getRendererBody($template, $data));
        return $this->response->withStatus(200);
    }

    private function setResponseBody($body): void
    {
        $this->response->getBody()->write($body);
    }

    private function getRendererBody($template, $data): string
    {
        return $this->blade->setTemplate($template)->setData($data)->render();
    }
}