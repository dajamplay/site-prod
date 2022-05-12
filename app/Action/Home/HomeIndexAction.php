<?php

namespace App\Action\Home;

use App\Action\BaseAction;
use App\Models\User\UserDTO;
use App\Support\ResponseDTO\ResponseDTO;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeIndexAction extends BaseAction
{

    public function __construct()
    {
    }

    public function __invoke(Request $request, $id = null): ResponseDTO
    {

        $user = new UserDTO();

        return $this->render(template: 'home.index', data: ['user' => $user]);
    }
}