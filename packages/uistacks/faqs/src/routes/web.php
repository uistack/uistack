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
    //Faqs
    Route::GET('faqs', 'UiStacks\Faqs\Controllers\FaqsController@index');
    Route::GET('faqs/create', 'UiStacks\Faqs\Controllers\FaqsController@create');
    Route::POST('faqs', 'UiStacks\Faqs\Controllers\FaqsController@store');
    Route::GET('faqs/{id}/edit', 'UiStacks\Faqs\Controllers\FaqsController@edit');
    Route::PATCH('faqs/{id}', 'UiStacks\Faqs\Controllers\FaqsController@update');
    Route::POST('faqs/bulk-operations', 'UiStacks\Faqs\Controllers\FaqsController@bulkOperations');
});