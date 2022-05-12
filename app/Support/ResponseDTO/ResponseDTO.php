<?php

namespace App\Support\ResponseDTO;

class ResponseDTO
{
    public function __construct(public string $template = '',
                                public array $dataForBody = [],
                                public int $statusCode = 200,
                                public array $headers = [])
    {
    }
}