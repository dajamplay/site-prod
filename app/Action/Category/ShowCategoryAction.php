<?php

namespace App\Action\Category;

use App\Action\BaseAction;
use App\Models\Category\CategoryDTO;
use App\Support\RequestAttributes\RequestAttrDTO;
use Psr\Http\Message\ServerRequestInterface;

class ShowCategoryAction extends BaseAction
{
    public function __construct()
    {

    }

    public function __invoke(ServerRequestInterface $request, $id): RequestAttrDTO
    {
        $category = new CategoryDTO();
        $category->id = $id;
        return $this->render(['category' => $category], 'category.show');
    }
}