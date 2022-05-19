<?php

namespace App\Actions\Admin\Home;

use App\Actions\BaseAction;

use App\Models\User\User;
use Psr\Http\Message\ResponseInterface;

class AdminHomeAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        $user = User::all()->first();
        return $this->render('admin.home.index', ['user' => $user]);
    }
}