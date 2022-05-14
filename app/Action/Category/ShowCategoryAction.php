<?php

namespace App\Action\Category;

use App\Action\BaseAction;
use App\Models\Category\CategoryDTO;
use Psr\Http\Message\ResponseInterface;

class ShowCategoryAction extends BaseAction
{
    public function __invoke($id): ResponseInterface
    {
        $category = new CategoryDTO();

        $category->id = $id;

        return $this->render(
            template: 'category.show',
            data: ['category' => $category]);
    }
}