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
	# Ads
	Route::GET('widgets', 'UiStacks\Widgets\Controllers\WidgetController@index');
	Route::GET('widgets/create', 'UiStacks\Widgets\Controllers\WidgetController@create');
	Route::POST('widgets', 'UiStacks\Widgets\Controllers\WidgetController@store');
	Route::GET('widgets/{id}/edit', 'UiStacks\Widgets\Controllers\WidgetController@edit');
	Route::PATCH('widgets/{id}', 'UiStacks\Widgets\Controllers\WidgetController@update');
	Route::POST('widgets/bulk-operations', 'UiStacks\Widgets\Controllers\WidgetController@bulkOperations');

});