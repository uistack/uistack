<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$locale = \Request::segment(1);

Route::group(['middleware' => ['api'], 'prefix' => $locale.'/api/{key}'], function() {
    
    // Users
    Route::GET('users', 'UiStacks\Users\Controllers\UsersApiController@listUsers');
    Route::POST('users', 'UiStacks\Users\Controllers\UsersApiController@storeUser');
    Route::POST('users/{id}/update', 'UiStacks\Users\Controllers\UsersApiController@updateUser');
});
