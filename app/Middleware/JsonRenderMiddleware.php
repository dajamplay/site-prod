<?php


namespace App\Middleware;

use App\Support\RequestAttributes\RequestAttr;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonRenderMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var RequestAttr $requestAttrActionData */
        $requestAttrActionData = $request->getAttribute(RequestAttr::ACTION_DATA);
        return new JsonResponse($requestAttrActionData->dataForBody, $requestAttrActionData->statusCode, $requestAttrActionData->headers, JSON_UNESCAPED_UNICODE);
    }
}