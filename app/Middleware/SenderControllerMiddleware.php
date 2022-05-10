<?php


namespace App\Middleware;

use App\Support\TemplateEngine\ResponseEnum;
use App\Support\TemplateEngine\TemplateInterface;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SenderControllerMiddleware implements MiddlewareInterface
{
    private TemplateInterface $blade;

    public function __construct(TemplateInterface $blade)
    {
        $this->blade = $blade;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        //TODO replace constant to instant of
        $data = $request->getAttribute(ResponseEnum::DATA);
        switch ($request->getAttribute(ResponseEnum::TYPE)) {
            case ResponseEnum::HTML:
                $body = $this->blade->render($request->getAttribute(ResponseEnum::TEMPLATE), $data);
                return new HtmlResponse($body, 200);
            case ResponseEnum::JSON:
                return new JsonResponse($data);
            default:
                return new Response();
        }
    }
}