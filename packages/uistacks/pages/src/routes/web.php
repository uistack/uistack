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
    //Pages
    Route::GET('pages', 'UiStacks\Pages\Controllers\PagesController@index');
    Route::GET('pages/dynamic', 'UiStacks\Pages\Controllers\PagesController@dynamic');
    Route::GET('pages/create', 'UiStacks\Pages\Controllers\PagesController@create');
    Route::POST('pages', 'UiStacks\Pages\Controllers\PagesController@store');
    Route::GET('pages/{id}/edit', 'UiStacks\Pages\Controllers\PagesController@edit');
    Route::PATCH('pages/{id}', 'UiStacks\Pages\Controllers\PagesController@update');
    Route::POST('pages/bulk-operations', 'UiStacks\Pages\Controllers\PagesController@bulkOperations');
});