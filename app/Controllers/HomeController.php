<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends AbstractHomeController
{
    public function index(): Response
    {
        return $this->render('main.home', ['name' => 'Maksim']);
    }

    public function admin(): Response
    {
        return $this->render('main.home');
    }
}