<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function ($router) {

    // Lists views
    $router->get('/lists', 'ListController@index');

});

Route::group(['prefix' => 'api', 'middleware' => ['api']], function ($router) {

    // Lists views
    $router->get('/lists', 'ApiListController@all');
    $router->post('/lists/create', 'ApiListController@create');
    $router->get('/lists/{listId}', 'ApiListController@get');
    $router->put('/lists/{listId}', 'ApiListController@update');
    $router->delete('/lists/{listId}', 'ApiListController@delete');

    $router->get('/lists/{listId}/columns', 'ApiListController@getColumns');
    $router->post('/lists/{listId}/columns/create', 'ApiListController@addColumn');
    $router->get('/columns/{columnId}', 'ApiColumnController@get');
    $router->put('/columns/{columnId}', 'ApiColumnController@update');
    $router->delete('/columns/{columnId}', 'ApiColumnController@delete');
});
