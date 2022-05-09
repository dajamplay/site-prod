<?php

namespace App\Support\TemplateEngine;

class Blade implements TemplateInterface
{
    private string $template;
    private array $data;

    public function render(): string
    {
        $cache = config('blade.cache');
        $views = config('blade.views');
        return (new \Jenssegers\Blade\Blade($views, $cache))->make($this->template, $this->data);
    }

    public function setTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }
}