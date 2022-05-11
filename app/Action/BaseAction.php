<?php


namespace App\Action;

use App\Support\RequestAttributes\RequestAttrDTO;

abstract class BaseAction
{
    public function render(array $data = [], string $template = '', $statusCode = 200): RequestAttrDTO
    {
        $requestAttrDTO = new RequestAttrDTO();
        $requestAttrDTO->data = $data;
        $requestAttrDTO->template = $template;
        $requestAttrDTO->statusCode = $statusCode;
        return $requestAttrDTO;
    }
}