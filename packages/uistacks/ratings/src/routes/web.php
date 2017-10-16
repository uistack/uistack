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
	# Ratings
	Route::GET('ratings', 'UiStacks\Ratings\Controllers\RatingsController@index');
	Route::GET('ratings/create', 'UiStacks\Ratings\Controllers\RatingsController@create');
	Route::POST('ratings', 'UiStacks\Ratings\Controllers\RatingsController@store');
	Route::GET('ratings/{id}/edit', 'UiStacks\Ratings\Controllers\RatingsController@edit');
	Route::PATCH('ratings/{id}', 'UiStacks\Ratings\Controllers\RatingsController@update');
	Route::POST('ratings/bulk-operations', 'UiStacks\Ratings\Controllers\RatingsController@bulkOperations');

});