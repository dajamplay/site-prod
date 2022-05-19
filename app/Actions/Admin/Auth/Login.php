<?php

namespace App\Actions\Admin\Auth;

use App\Actions\Action;

use Psr\Http\Message\ResponseInterface;

class Login extends Action
{
    public function __invoke(): ResponseInterface
    {
        return $this->render('admin.auth.login');
    }
}