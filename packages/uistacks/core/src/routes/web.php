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

Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function() {
	Route::get('login', 'UiStacks\Core\Controllers\AdminLoginController@getAdmin');
	Route::post('login', 'UiStacks\Core\Controllers\AdminLoginController@postAdmin');
	Route::get('logout', 'UiStacks\Core\Controllers\AdminLoginController@getAdminLogout');
});

Route::group(['middleware' => ['web'], 'prefix' => $locale.'/admin'], function() {
	Route::get('login', 'UiStacks\Core\Controllers\AdminLoginController@getAdmin');
	Route::post('login', 'UiStacks\Core\Controllers\AdminLoginController@postAdmin');
	Route::get('logout', 'UiStacks\Core\Controllers\AdminLoginController@getAdminLogout');
});

$action = 'UiStacks\Core\Controllers\DashboardController@index';
if(Config::has('uistacks.dashboard_function') && !empty(config('uistacks.dashboard_function'))){
	$action = config('uistacks.dashboard_function');
}

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale], function() use($action) {
	Route::get('admin', $action);
});

Route::group(['middleware' => ['web' ,'admin']], function() use($action) {
    
	Route::get('admin', $action);

        
        
});

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale.'/admin'], function() {
	Route::POST('delete-item', 'UiStacks\Core\Controllers\OperationsController@delete');
	Route::POST('bulk-delete-items', 'UiStacks\Core\Controllers\OperationsController@bulkDelete');
});