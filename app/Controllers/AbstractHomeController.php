<?php

namespace App\Controllers;

use App\Support\TemplateEngine\ResponseEnum;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class AbstractHomeController
{
    public function __construct(protected ServerRequestInterface $request, protected RequestHandlerInterface $handler)
    {
    }

    public function render(string $template, array $data = [], string $type = ResponseEnum::HTML): ResponseInterface
    {
        //TODO Replace render to JsonResponse and HtmlResponse
        $this->setAttributes($template, $data, $type);
        return $this->handler->handle($this->request);
    }

    private function setAttributes(string $template, array $data, string $type)
    {
        $this->request = $this->request->withAttribute(ResponseEnum::DATA, $data);
        $this->request = $this->request->withAttribute(ResponseEnum::TEMPLATE, $template);
        $this->request = $this->request->withAttribute(ResponseEnum::TYPE, $type);
    }
}