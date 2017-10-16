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
	# Articles 
	Route::GET('articles', 'uistacks\Articles\Controllers\ArticlesApiController@list');
	Route::POST('articles', 'uistacks\Articles\Controllers\ArticlesApiController@storePage');
	Route::POST('articles/{id}/update', 'uistacks\Articles\Controllers\ArticlesApiController@updatePage');
});