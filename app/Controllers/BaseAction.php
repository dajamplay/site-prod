<?php


namespace App\Controllers;


use App\Support\TemplateEngine\Blade;
use App\Support\TemplateEngine\ResponseEnum;

class BaseAction
{
    public function render(array $data, string $template = '')
    {
        return [
            ResponseEnum::DATA => $data,
            Blade::TEMPLATE => $template
        ];
    }
}