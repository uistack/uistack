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
	# Ratings 
	Route::GET('ratings', 'UiStacks\Ratings\Controllers\RatingsApiController@list');
	Route::POST('ratings', 'UiStacks\Ratings\Controllers\RatingsApiController@storeAd');
	Route::POST('ratings/{id}/update', 'UiStacks\Ratings\Controllers\RatingsApiController@updateAd');

});
