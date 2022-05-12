<?php


namespace App\Middleware;

use App\Support\ResponseDTO\ResponseDTO;
use App\Support\TemplateEngine\TemplateInterface;
use Laminas\Diactoros\Response\EmptyResponse;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HtmlRenderMiddleware implements MiddlewareInterface
{
    private TemplateInterface $templateEngine;

    public function __construct(TemplateInterface $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /**
         * @var ResponseDTO $requestAttrActionData
         * @var string $body
         */
        $responseDTO = $request->getAttribute(ResponseDTO::class);

        switch ($responseDTO->statusCode) {
            case 200:
                $body = $this->templateEngine->render($responseDTO->template, $responseDTO->dataForBody);
                return new HtmlResponse($body, $responseDTO->statusCode, $responseDTO->headers);
            default:
                return new EmptyResponse($responseDTO->statusCode, $responseDTO->headers);
        }
    }
}