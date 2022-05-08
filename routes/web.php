<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->get('/', ['App\Controllers\HomeController', 'index']);
    $r->get('/admin', ['App\Controllers\HomeController', 'admin']);
};