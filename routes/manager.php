<?php

use App\Controllers\Manager\ManagerController;
use App\Controllers\Manager\CategoriesController;

$routes->group('manager', ['namespace' => 'App\Controllers\Manager'], function ($routes){
    $routes->get('/', [ManagerController::class, 'index'], ['as' => 'manager']);
    
    $routes->group('categories', function ($routes) {
        $routes->get('/', [CategoriesController::class, 'index'], ['as' => 'categories']);
        $routes->get('get-all', [CategoriesController::class, 'getAllCategories'], ['as' => 'categories.get.all']);
        $routes->get('get-info', [CategoriesController::class, 'getCategoryInfo'], ['as' => 'categories.get.info']);
       
        $routes->post('create', [CategoriesController::class, 'create'], ['as' => 'categories.create']);
        $routes->put('update', [CategoriesController::class, 'update'], ['as' => 'categories.update']);
    });
});