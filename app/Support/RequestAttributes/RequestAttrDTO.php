<?php

namespace App\Support\RequestAttributes;

class RequestAttrDTO
{
    public const REQUEST_ATTR = '_request_attributes';
    public int $statusCode = 200;
    public array $dataForBody = [];
    public mixed $template = null;
    public array $headers = [];
}