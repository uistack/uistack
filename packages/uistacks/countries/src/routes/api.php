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
	# Countries 
	Route::GET('countries', 'UiStacks\Countries\Controllers\CountriesApiController@list');
	Route::POST('countries', 'UiStacks\Countries\Controllers\CountriesApiController@storeCountry');
	Route::POST('countries/{id}/update', 'UiStacks\Countries\Controllers\CountriesApiController@updateCountry');

	# Areas 
	Route::GET('countries-areas', 'UiStacks\Countries\Controllers\AreasApiController@list');
	Route::POST('countries-areas', 'UiStacks\Countries\Controllers\AreasApiController@storeArea');
	Route::POST('countries-areas/{id}/update', 'UiStacks\Countries\Controllers\AreasApiController@updateArea');
});
