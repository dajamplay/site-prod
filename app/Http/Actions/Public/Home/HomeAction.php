<?php

namespace App\Http\Actions\Public\Home;

use App\Http\Actions\BaseAction;
use App\Http\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class HomeAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        $user = User::first();
        return $this->render('public.home.index', ['user' => $user]);
    }
}