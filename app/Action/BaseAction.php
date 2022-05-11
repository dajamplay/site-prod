<?php


namespace App\Action;

use App\Support\RequestAttributes\RequestAttrDTO;

abstract class BaseAction
{
    protected function render(array $dataForBody = [], string $template = null, $statusCode = 200, $headers = []): RequestAttrDTO
    {
        $requestAttrDTO = new RequestAttrDTO();
        $requestAttrDTO->dataForBody = $dataForBody;
        $requestAttrDTO->template = $template;
        $requestAttrDTO->statusCode = $statusCode;
        $requestAttrDTO->headers = $headers;
        return $requestAttrDTO;
    }

    protected function redirect(string $url)
    {
        header('Location: '. $url);
        return new RequestAttrDTO();
    }
}