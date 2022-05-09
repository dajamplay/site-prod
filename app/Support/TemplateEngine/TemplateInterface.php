<?php

namespace App\Support\TemplateEngine;

interface TemplateInterface
{
    public function render(string $template, array $data): string;
}