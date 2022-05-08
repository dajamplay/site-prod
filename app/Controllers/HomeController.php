<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

class HomeController extends BaseController
{
    public function index(): ResponseInterface
    {
        $this->response->getBody()->write('<br />HomeController:index');
        return $this->response;
    }

    public function admin(): ResponseInterface
    {
        $this->response->getBody()->write('<br />HomeController:admin');
        return $this->response;
    }
}