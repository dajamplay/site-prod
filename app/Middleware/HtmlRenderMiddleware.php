<?php


namespace App\Middleware;

use App\Support\RequestAttributes\RequestAttrDTO;
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
        /** @var RequestAttrDTO $requestAttrDTO */
        $requestAttrDTO = $request->getAttribute(RequestAttrDTO::REQUEST_ATTR);

        $body = $this->blade->render($requestAttrDTO->template, $requestAttrDTO->dataForBody);

        return new HtmlResponse($body, $requestAttrDTO->statusCode, $requestAttrDTO->headers);
    }
}