<?php


namespace App\Action;

use App\Support\ResponseDTO\ResponseDTO;

abstract class BaseAction
{
    protected function render(string $template, array $data = [],  $headers = []): ResponseDTO
    {
        return new ResponseDTO($template, $data, 200, $headers);
    }

    protected function redirect(string $url, int $status = 302, $headers = [])
    {
        $headers['Location'] = $url;
        return new ResponseDTO('', [], $status, $headers);
    }
}