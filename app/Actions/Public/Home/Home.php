<?php

namespace App\Actions\Public\Home;

use App\Actions\Action;
use App\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class Home extends Action
{
    public function __invoke(): ResponseInterface
    {
        $user = User::first();
        return $this->render('public.home.index', ['user' => $user]);
    }
}