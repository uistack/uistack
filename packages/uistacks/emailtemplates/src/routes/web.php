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
    Route::GET('emailtemplates', 'UiStacks\Emailtemplates\Controllers\EmailTemplatesController@index');
    Route::GET('emailtemplates/create', 'UiStacks\Emailtemplates\Controllers\EmailTemplatesController@create');
    Route::POST('emailtemplates', 'UiStacks\Emailtemplates\Controllers\EmailTemplatesController@store');
    Route::GET('emailtemplates/{id}/edit', 'UiStacks\Emailtemplates\Controllers\EmailTemplatesController@edit');
    Route::PATCH('emailtemplates/{id}', 'UiStacks\Emailtemplates\Controllers\EmailTemplatesController@update');
});