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
    # Blogs
    Route::GET('blogs', 'UiStacks\Blogs\Controllers\BlogsController@index');
    Route::GET('blogs/create', 'UiStacks\Blogs\Controllers\BlogsController@create');
    Route::POST('blogs', 'UiStacks\Blogs\Controllers\BlogsController@store');
    Route::GET('blogs/{id}/edit', 'UiStacks\Blogs\Controllers\BlogsController@edit');
    Route::PATCH('blogs/{id}', 'UiStacks\Blogs\Controllers\BlogsController@update');
    Route::POST('blogs/bulk-operations', 'UiStacks\Blogs\Controllers\BlogsController@bulkOperations');

    # ِComments
    Route::GET('blogs/comments/{id}', 'UiStacks\Blogs\Controllers\CommentsController@index');
    Route::GET('blogs/comments/{id}/create', 'UiStacks\Blogs\Controllers\CommentsController@create');
    Route::POST('blogs/comments/{id}', 'UiStacks\Blogs\Controllers\CommentsController@store');
    Route::GET('blogs/comments/{post_id}/{id}/edit', 'UiStacks\Blogs\Controllers\CommentsController@edit');
    Route::PATCH('blogs/comments/{post_id}/{id}', 'UiStacks\Blogs\Controllers\CommentsController@update');
    Route::POST('blogs/comments/bulk-operations', 'UiStacks\Blogs\Controllers\CommentsController@bulkOperations');
});
