<?php

namespace App\Action\Home;

use App\Action\BaseAction;
use App\Models\User\UserDTO;
use App\Support\RequestAttributes\RequestAttrDTO;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeIndexAction extends BaseAction
{

    public function __construct()
    {
    }

    public function __invoke(Request $request, $id = null): RequestAttrDTO
    {
        $user = new UserDTO();

        return $this->render(['user' => $user], 'home.index', 404);
    }
}