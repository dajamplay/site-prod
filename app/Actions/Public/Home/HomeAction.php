<?php

namespace App\Actions\Public\Home;

use App\Actions\BaseAction;
use App\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class HomeAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        $user = User::first();
        return $this->render('public.home.index', ['user' => $user]);
    }
}