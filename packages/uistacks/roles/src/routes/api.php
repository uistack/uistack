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
	# Activities 
	Route::GET('activities', 'UiStacks\Activities\Controllers\ActivitiesApiController@list');
	Route::POST('activities', 'UiStacks\Activities\Controllers\ActivitiesApiController@storeActivity');
	Route::POST('activities/{id}/update', 'UiStacks\Activities\Controllers\ActivitiesApiController@updateActivity');

});
