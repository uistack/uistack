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
	# Stores
	Route::GET('stores', 'UiStacks\Stores\Controllers\StoresController@index');
	Route::GET('stores/create', 'UiStacks\Stores\Controllers\StoresController@create');
	Route::POST('stores', 'UiStacks\Stores\Controllers\StoresController@store');
	Route::GET('stores/{id}/edit', 'UiStacks\Stores\Controllers\StoresController@edit');
	Route::PATCH('stores/{id}', 'UiStacks\Stores\Controllers\StoresController@update');
	Route::POST('stores/bulk-operations', 'UiStacks\Stores\Controllers\StoresController@bulkOperations');

    Route::POST('stores/delete-store-gallery-images', 'UiStacks\Stores\Controllers\StoresController@deleteStoreGalleryImages');
});