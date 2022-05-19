<?php

namespace App\Actions\Admin\Home;

use App\Actions\Action;

use App\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class Home extends Action
{
    public function __invoke(): ResponseInterface
    {
        $user = User::all()->first();
        return $this->render('admin.home.index', ['user' => $user]);
    }
}