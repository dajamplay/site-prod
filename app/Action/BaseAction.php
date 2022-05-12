<?php


namespace App\Action;

use App\Support\ResponseDTO\ResponseDTO;

abstract class BaseAction
{
    protected function render(string $template, array $dataForBody = [],  $headers = []): ResponseDTO
    {
        return new ResponseDTO($template, $dataForBody, 200, $headers);
    }

    protected function redirect(string $url, int $statusCode = 302, $headers = [])
    {
        $headers['Location'] = $url;
        return new ResponseDTO('', [], $statusCode, $headers);
    }
}