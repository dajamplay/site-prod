<?php

namespace App\Http\Actions\Public\Category;

use App\Http\Actions\BaseAction;
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