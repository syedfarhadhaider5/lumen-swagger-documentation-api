<?php

use Laravel\Lumen\Routing\Router;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->post('/get-token', 'UserController@login');

$router->group(['middleware' => 'token'], function () use ($router) {
    // Admin routes
    $router->group(['prefix' => 'dealership', 'middleware' => 'admin'], function () use ($router) {
    });
    // dealership user routes
    $router->group(['middleware' => 'dealership'], function () use ($router) {
        $router->get('/vehicle/{id}', 'VehicleController@show');
        $router->get('/vehicles', 'VehicleController@index');
        $router->post('/search', 'VehicleController@search');
    });
});
