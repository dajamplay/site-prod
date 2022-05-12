<?php


namespace App\Middleware;

use App\Support\ResponseDTO\ResponseDTO;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class JsonRenderMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var ResponseDTO $responseDTO */
        $responseDTO = $request->getAttribute(ResponseDTO::class);

        return new JsonResponse(
            data: $responseDTO->data,
            status: $responseDTO->status,
            headers: $responseDTO->headers,
            encodingOptions: JSON_UNESCAPED_UNICODE);
    }
}