<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/employees', 'EmployeeController@index');
$router->get('/employees/create', 'EmployeeController@create');
$router->post('/employees/store', 'EmployeeController@store');
$router->get('/employees/{id}', 'EmployeeController@show');
$router->get('/employees/edit/{id}', 'EmployeeController@edit');
$router->put('/employees/update', 'EmployeeController@update');
$router->delete('/employees/delete/{id}', 'EmployeeController@destroy');
