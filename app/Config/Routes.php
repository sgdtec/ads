<?php

use App\Controllers\HomeController;
use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(false);

$routes->get('/', [HomeController::class, 'index'], ['as' => 'home']);

// Routes to the manager
if(file_exists($manager = ROOTPATH . 'routes/manager.php')) {
    require $manager;
}

// Routes to the API REST
if(file_exists($api = ROOTPATH . 'routes/api.php')) {
    require $api;
}
