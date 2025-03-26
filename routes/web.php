<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/users', function () {
    return response()->json(['message' => 'Users endpoint working!']);
});



$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users', 'UserController@index');  // List all users
    $router->post('/users', 'UserController@store'); // Create a user
    $router->get('/users/{id}', 'UserController@show');  // Get a user
    $router->put('/users/{id}', 'UserController@update'); // Update a user
    $router->delete('/users/{id}', 'UserController@destroy'); // Delete a user

});

