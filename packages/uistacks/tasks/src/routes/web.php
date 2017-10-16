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
	# Tasks
	Route::GET('tasks', 'UiStacks\Tasks\Controllers\TasksController@index');
	Route::GET('tasks/create', 'UiStacks\Tasks\Controllers\TasksController@create');
	Route::POST('tasks', 'UiStacks\Tasks\Controllers\TasksController@store');
	Route::GET('tasks/{id}/edit', 'UiStacks\Tasks\Controllers\TasksController@edit');
	Route::PATCH('tasks/{id}', 'UiStacks\Tasks\Controllers\TasksController@update');
	Route::POST('tasks/bulk-operations', 'UiStacks\Tasks\Controllers\TasksController@bulkOperations');

    Route::POST('tasks/delete-store-gallery-images', 'UiStacks\Tasks\Controllers\TasksController@deleteStoreGalleryImages');
});