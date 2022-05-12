<?php

namespace App\Support\ResponseDTO;

class ResponseDTO
{
    public function __construct(public string $template = '',
                                public array $data = [],
                                public int $status = 200,
                                public array $headers = [])
    {
    }
}