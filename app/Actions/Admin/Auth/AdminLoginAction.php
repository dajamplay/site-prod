<?php

namespace App\Actions\Admin\Auth;

use App\Actions\BaseAction;

use Psr\Http\Message\ResponseInterface;

class AdminLoginAction extends BaseAction
{
    public function __invoke(): ResponseInterface
    {
        return $this->render('admin.auth.login');
    }
}