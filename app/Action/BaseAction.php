<?php


namespace App\Action;

use App\Support\RequestAttributes\RequestAttr;

abstract class BaseAction
{
    protected function render(string $template, array $dataForBody = [],  $headers = []): RequestAttr
    {
        return new RequestAttr($template, $dataForBody, 200, $headers);
    }

    protected function redirect(string $url, int $statusCode = 302, $headers = [])
    {
        $headers['Location'] = $url;
        return new RequestAttr('', [], $statusCode, $headers);
    }
}