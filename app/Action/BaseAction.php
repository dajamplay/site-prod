<?php


namespace App\Action;

use App\Support\ResponseDTO\ResponseDTO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class BaseAction
{
    protected ServerRequestInterface $request;
    private RequestHandlerInterface $handler;

    public function __construct(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        $this->request = $request;
        $this->handler = $handler;
    }

    protected function render(string $template, array $data = [],  $headers = []): ResponseInterface
    {
        $this->request = $this->request->withAttribute(ResponseDTO::class, new ResponseDTO($template, $data, 200, $headers));
        return $this->handler->handle($this->request);
    }

    protected function redirect(string $url, int $status = 302, $headers = [])
    {
        $headers['Location'] = $url;
        $this->request = $this->request->withAttribute(ResponseDTO::class, new ResponseDTO('', [], $status, $headers));
        return $this->handler->handle($this->request);
    }
}