<?php

$router->group(['middleware' => ['web']], function ($router) {

    $router->get('/', function () {
        //return view('welcome');
        return view('home');
    });

    // List routes
    $router->get('/lists', 'ListeController@index');
    $router->get('/lists/{list}', 'ListeController@show');
    $router->get('/lists/create', 'ListeController@create');
    $router->post('/lists', 'ListeController@store');
    $router->get('/lists/edit/{list}', 'ListeController@edit');
    $router->put('/lists/edit/{list}', 'ListeController@update');
    $router->delete('/lists/{list}', 'ListeController@delete');

    // Column routes
    $router->get('/lists/{list}/columns', 'ColumnController@index');
    $router->get('/lists/{list}/columns/create', 'ColumnController@create');
    $router->post('/lists/{list}/columns', 'ColumnController@store');
});
