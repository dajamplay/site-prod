<?php

namespace App\Action\Home;

use App\Action\BaseAction;
use App\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class HomeIndexAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        $user = User::all()->first();
        return $this->render('home.index', ['user' => $user]);
    }
}