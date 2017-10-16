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
	# Countries
	Route::GET('countries', 'UiStacks\Countries\Controllers\CountriesController@index');
	Route::GET('countries/create', 'UiStacks\Countries\Controllers\CountriesController@create');
	Route::POST('countries', 'UiStacks\Countries\Controllers\CountriesController@store');
	Route::GET('countries/{id}/edit', 'UiStacks\Countries\Controllers\CountriesController@edit');
	Route::PATCH('countries/{id}', 'UiStacks\Countries\Controllers\CountriesController@update');
	Route::POST('countries/bulk-operations', 'UiStacks\Countries\Controllers\CountriesController@bulkOperations');

	# ِAreas
	Route::GET('countries-areas', 'UiStacks\Countries\Controllers\AreasController@index');
	Route::GET('countries-areas/create', 'UiStacks\Countries\Controllers\AreasController@create');
	Route::POST('countries-areas', 'UiStacks\Countries\Controllers\AreasController@store');
	Route::GET('countries-areas/{id}/edit', 'UiStacks\Countries\Controllers\AreasController@edit');
	Route::PATCH('countries-areas/{id}', 'UiStacks\Countries\Controllers\AreasController@update');
	Route::POST('countries-areas/bulk-operations', 'UiStacks\Countries\Controllers\AreasController@bulkOperations');
});