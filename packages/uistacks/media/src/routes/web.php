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

Route::group(['middleware' => 'web'], function() {

	Route::GET('media', 'UiStacks\Media\Controllers\MediaController@index');
	Route::GET('media/upload', 'UiStacks\Media\Controllers\MediaController@upload');
	Route::POST('media/upload', 'UiStacks\Media\Controllers\MediaController@storeFile');
	Route::GET('media/{id}/edit', 'UiStacks\Media\Controllers\MediaController@edit');
	Route::PATCH('media/{id}', 'UiStacks\Media\Controllers\MediaController@update');
	Route::GET('media/{id}/confirm-delete', 'UiStacks\Media\Controllers\MediaController@confirmDelete');
	Route::DELETE('media/{id}', 'UiStacks\Media\Controllers\MediaController@delete');

	Route::POST('upload-media-file', 'UiStacks\Media\Controllers\MediaController@storeFile');
        Route::POST('fetch-image-url', 'UiStacks\Media\Controllers\MediaController@fetchImageUrlToGallery');
});