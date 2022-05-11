<?php


namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;

class HomeAction extends BaseAction
{
    public function __construct()
    {

    }

    public function __invoke(ServerRequestInterface $request): array
    {
        $user = new User();

        return $this->render(['user' => $user], 'main.home');
    }
}