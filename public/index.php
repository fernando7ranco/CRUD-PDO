<?php

define('__APP_ROOT__', dirname(__DIR__));

require __APP_ROOT__ . '/vendor/autoload.php';

use App\Router;

$router = new Router();

$router
    ->on('GET', 'home','\SistemaController@index')
	->get('create','\SistemaController@create')
	->post('create','\SistemaController@store');
	
echo $router($router->method(), $router->uri());
