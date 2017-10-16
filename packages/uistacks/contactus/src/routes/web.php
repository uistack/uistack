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

Route::group(['middleware' => ['web', 'admin'], 'prefix' => $locale . '/admin'], function() {
    # Contact Us Section
    Route::GET('contactus-section', 'UiStacks\Contactus\Controllers\ContactusController@sectionIndex');
    Route::GET('contactus-section-create', 'UiStacks\Contactus\Controllers\ContactusController@createSection');
    Route::POST('contactus-section-create', 'UiStacks\Contactus\Controllers\ContactusController@storeSection');
    Route::GET('contactus-section-update/{id}/edit', 'UiStacks\Contactus\Controllers\ContactusController@editSection');
    Route::PATCH('contactus-section-update/{id}', 'UiStacks\Contactus\Controllers\ContactusController@updateSection');
    Route::GET('contactus/{id}', 'UiStacks\Contactus\Controllers\ContactusController@show');
    Route::GET('contactus/change-section-status/{id}', 'UiStacks\Contactus\Controllers\ContactusController@changeSectionStatus');
    Route::POST('contactus/bulk-operations-section', 'UiStacks\Contactus\Controllers\ContactusController@bulkOperationsSection');

    # Contact Us
    Route::GET('contactus', 'UiStacks\Contactus\Controllers\ContactusController@index');
    Route::GET('contactus/{id}', 'UiStacks\Contactus\Controllers\ContactusController@show');
    Route::GET('contactus/change-status/{id}', 'UiStacks\Contactus\Controllers\ContactusController@changeStatus');
    Route::POST('contactus/request-reply/{id}', 'UiStacks\Contactus\Controllers\ContactusApiController@postReply');
    Route::POST('contactus/bulk-operations', 'UiStacks\Contactus\Controllers\ContactusController@bulkOperations');
});
