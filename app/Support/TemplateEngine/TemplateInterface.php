<?php

namespace App\Support\TemplateEngine;

interface TemplateInterface
{
    public function render(): string;
    public function setTemplate(string $template): self;
    public function setData(array $data): self;
}