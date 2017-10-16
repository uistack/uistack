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

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale.'/admin'], function() {
	# Roles
	Route::GET('roles', 'UiStacks\Roles\Controllers\RolesController@index');
	Route::GET('roles/create', 'UiStacks\Roles\Controllers\RolesController@create');
	Route::POST('roles', 'UiStacks\Roles\Controllers\RolesController@store');
	Route::GET('roles/{id}/edit', 'UiStacks\Roles\Controllers\RolesController@edit');
	Route::PATCH('roles/{id}', 'UiStacks\Roles\Controllers\RolesController@update');
	Route::POST('roles/bulk-operations', 'UiStacks\Roles\Controllers\RolesController@bulkOperations');

});