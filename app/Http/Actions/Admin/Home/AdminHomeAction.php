<?php

namespace App\Http\Actions\Admin\Home;

use App\Http\Actions\BaseAction;

use App\Http\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class AdminHomeAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        $user = User::all()->first();
        return $this->render('admin.home.index', ['user' => $user]);
    }
}