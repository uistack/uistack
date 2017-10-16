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
	# Banners
	Route::GET('banners', 'UiStacks\Banners\Controllers\BannersController@index');
	Route::GET('banners/create', 'UiStacks\Banners\Controllers\BannersController@create');
	Route::POST('banners', 'UiStacks\Banners\Controllers\BannersController@store');
	Route::GET('banners/{id}/edit', 'UiStacks\Banners\Controllers\BannersController@edit');
	Route::PATCH('banners/{id}', 'UiStacks\Banners\Controllers\BannersController@update');
	Route::POST('banners/bulk-operations', 'UiStacks\Banners\Controllers\BannersController@bulkOperations');
});