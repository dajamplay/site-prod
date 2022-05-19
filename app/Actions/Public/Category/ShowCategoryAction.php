<?php

namespace App\Actions\Public\Category;

use App\Actions\BaseAction;
use Psr\Http\Message\ResponseInterface;

class ShowCategoryAction extends BaseAction
{
    public function __invoke($id): ResponseInterface
    {

        return $this->render(
            template: 'public.category.show',
            data: ['category' => $category = ['id' => $id]]);
    }
}