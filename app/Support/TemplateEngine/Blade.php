<?php

namespace App\Support\TemplateEngine;

class Blade implements TemplateInterface
{
    public function render(string $template, array $data = []): string
    {
        $cache = config('blade.cache');
        $views = config('blade.views');
        return  (new \Jenssegers\Blade\Blade($views, $cache))->make($template, $data);
    }
}