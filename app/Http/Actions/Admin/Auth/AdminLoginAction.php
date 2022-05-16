<?php

namespace App\Http\Actions\Admin\Auth;

use App\Http\Actions\BaseAction;

use Psr\Http\Message\ResponseInterface;

class AdminLoginAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        return $this->render('admin.auth.login');
    }
}