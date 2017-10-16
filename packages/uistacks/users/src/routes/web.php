<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */
$locale = \Request::segment(1);
Route::group(['middleware' => ['web', 'admin'], 'prefix' => $locale . '/admin'], function() {
    //Members
    Route::GET('users/give-permission/{role}/{user_id}', 'UiStacks\Users\Controllers\UsersController@givePermission');
    Route::POST('users/give-permission/{role}/{user_id}', 'UiStacks\Users\Controllers\UsersController@givePermission');
    Route::GET('users/{role}', 'UiStacks\Users\Controllers\UsersController@index');
    Route::GET('users/{role}/create', 'UiStacks\Users\Controllers\UsersController@create');
    Route::POST('users/{role}', 'UiStacks\Users\Controllers\UsersController@store');
    Route::GET('users/{role}/{id}/edit', 'UiStacks\Users\Controllers\UsersController@edit');
    Route::PATCH('users/{role}/{id}', 'UiStacks\Users\Controllers\UsersController@update');
    Route::POST('users/bulk-operations/users', 'UiStacks\Users\Controllers\UsersController@bulkOperations');
});
Route::GET('users/change-status', 'UiStacks\Users\Controllers\UsersController@changeStatus');
