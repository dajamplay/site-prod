<?php

namespace App\Action\Home;

use App\Action\BaseAction;
use App\Models\User\UserDTO;
use Psr\Http\Message\ResponseInterface;

class HomeIndexAction extends BaseAction
{

    public function __invoke(): ResponseInterface
    {
        $user = new UserDTO();

        return $this->render(
            template: 'home.index',
            data: ['user' => $user]);
    }
}