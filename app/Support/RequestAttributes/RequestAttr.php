<?php

namespace App\Support\RequestAttributes;

class RequestAttr
{
    public const ACTION_DATA = '_request_attributes';

    public function __construct(public string $template = '',
                                public array $dataForBody = [],
                                public int $statusCode = 200,
                                public array $headers = [])
    {
    }
}