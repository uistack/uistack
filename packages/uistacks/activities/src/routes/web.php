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
	//Activities
	Route::GET('activities', 'UiStacks\Activities\Controllers\ActivitiesController@index');
	Route::GET('activities/create', 'UiStacks\Activities\Controllers\ActivitiesController@create');
	Route::POST('activities', 'UiStacks\Activities\Controllers\ActivitiesController@store');
	Route::GET('activities/{id}/edit', 'UiStacks\Activities\Controllers\ActivitiesController@edit');
	Route::PATCH('activities/{id}', 'UiStacks\Activities\Controllers\ActivitiesController@update');
	Route::POST('activities/bulk-operations', 'UiStacks\Activities\Controllers\ActivitiesController@bulkOperations');

});