<?php

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

// Generate Application Key
$router->get('/key', function () {
    $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($string), 0 , 32);
});

// users
$router->post('/users/register', 'AuthController@register');
$router->post('/users/login', 'AuthController@login');

// books
$router->get('/books', 'BookController@index');
$router->get('/books/{id}', 'BookController@show');
$router->post('/books', 'BookController@store');
$router->put('/books/{id}', 'BookController@update');
$router->delete('/books/{id}', 'BookController@destroy');