<?php


namespace App\Middleware;

use App\Support\RequestAttributes\RequestAttrDTO;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonRenderMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var RequestAttrDTO $requestAttrDTO */
        $requestAttrDTO = $request->getAttribute(RequestAttrDTO::REQUEST_ATTR);

        return new JsonResponse($requestAttrDTO->data, $requestAttrDTO->statusCode, $requestAttrDTO->headers, JSON_UNESCAPED_UNICODE);
    }
}