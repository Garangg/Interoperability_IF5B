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

$router->get('/hello-lumen/{name}', function ($name) {
    return 'Hello'.' '. $name;
});

$router->get('/login', ['middleware' => 'login', function () {
    return "<h1>Hallo, Selamat anda berhasil login</h1>";
}]);

$router->get('/register', ['middleware' => 'register', function () {
    return "<h1>Hallo, Selamat anda berhasil register</h1>";
}]);

$router->get('/logout', ['middleware' => 'logout', function () {
    return "<h1>Hallo, Selamat anda berhasil logout</h1>";
}]);

$router->get('/admin', ['middleware' => 'admin', function () {
    return "<h1>Hallo, Selamat anda berhasil login sebagai admin</h1>";
}]);

$router->get('/landingpage', ['middleware' => 'user', function () {
    return "<h1>Hallo, Selamat anda berhasil login sebagai user</h1>";
}]);

$router->get('/home', 'HomeController@index');

$router->get('/about', 'AboutController@about');

$router->get('/dashboard', 'DashboardController@index');

// 5 Route dari 5 Migrations (Tugas 4)

$router->get('/users', 'UsersController@index');

$router->get('/items', 'ItemsController@index');

$router->get('/posts', 'PostsController@index');

$router->get('/categories', 'CategoriesController@index');

$router->get('/tags', 'TagsController@index');
