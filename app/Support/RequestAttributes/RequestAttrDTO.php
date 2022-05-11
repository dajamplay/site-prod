<?php

namespace App\Support\RequestAttributes;

class RequestAttrDTO
{
    public const REQUEST_ATTR = '_request_attributes';
    public int $statusCode = 200;
    public array $dataForBody = [];
    public string $template = '';
    public array $headers = [];
}