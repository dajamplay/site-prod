<?php

namespace App\Action\Home;

use App\Action\BaseAction;
use App\Models\User\UserDTO;
use App\Support\RequestAttributes\RequestAttr;
use App\Support\Session\Session;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeIndexAction extends BaseAction
{

    public function __construct()
    {
    }

    public function __invoke(Request $request, $id = null): RequestAttr
    {
        $user = new UserDTO();

        return $this->redirect('/category/25');
    }
}