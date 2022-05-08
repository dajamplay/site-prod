<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

class HomeController extends BaseController
{
    public function index(): ResponseInterface
    {
        $this->response->getBody()->write('<br />HomeController');
        return $this->response;
    }

    public function admin(): ResponseInterface
    {
        $this->response->getBody()->write('<br />HomeController: ');
        return $this->response;
    }
}