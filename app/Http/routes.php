<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->resource('authenticate', '\App\Http\Controllers\AuthenticateController', ['only'=>['index']]);
});

/*$api->version('v1', function ($api) {
    $api->post('authenticate', '\App\Http\Controllers\AuthenticateController@authenticate');
});*/

Route::group(['prefix' => 'api'], function()
{
    Route::post('authenticate', 'AuthenticateController@authenticate');
});
