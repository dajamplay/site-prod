<?php

namespace App\Actions\Public\Category;

use App\Actions\Action;
use Psr\Http\Message\ResponseInterface;

class ShowCategory extends Action
{
    public function __invoke($id): ResponseInterface
    {

        return $this->render(
            template: 'public.category.show',
            data: ['category' => $category = ['id' => $id]]);
    }
}