<?php


namespace App\Action;

use App\Support\RequestAttributes\RequestAttrDTO;

abstract class BaseAction
{
    public function render(array $dataForBody = [], string $template = '', $statusCode = 200, $headers = []): RequestAttrDTO
    {
        $requestAttrDTO = new RequestAttrDTO();
        $requestAttrDTO->dataForBody = $dataForBody;
        $requestAttrDTO->template = $template;
        $requestAttrDTO->statusCode = $statusCode;
        $requestAttrDTO->headers = $headers;
        return $requestAttrDTO;
    }
}