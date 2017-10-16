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

Route::group(['middleware' => ['web' ,'admin'], 'prefix' => $locale.'/admin'], function() use($locale) {
    # Settings
    Route::GET('/settings', function () use($locale)
    {
        return redirect($locale.'/admin/settings/accounts');
    });
    Route::GET('/settings/info', 'UiStacks\Settings\Controllers\SettingsController@editInformation');
    Route::POST('/settings/info', 'UiStacks\Settings\Controllers\SettingsController@updateInformation');
    Route::GET('/settings/smtp', 'UiStacks\Settings\Controllers\SettingsController@editSmtp');
    Route::POST('/settings/smtp', 'UiStacks\Settings\Controllers\SettingsController@updateSmtp');
    Route::GET('/settings/accounts', 'UiStacks\Settings\Controllers\SettingsController@editSocialAccounts');
    Route::POST('/settings/accounts', 'UiStacks\Settings\Controllers\SettingsController@updateSocialAccounts');
    Route::GET('/settings/links', 'UiStacks\Settings\Controllers\SettingsController@editAppLinks');
    Route::POST('/settings/links', 'UiStacks\Settings\Controllers\SettingsController@updateAppLinks');
    Route::GET('/settings/seo', 'UiStacks\Settings\Controllers\SettingsController@editSeo');
    Route::POST('/settings/seo', 'UiStacks\Settings\Controllers\SettingsController@updateSeo');
    Route::GET('/settings/fcm', 'UiStacks\Settings\Controllers\SettingsController@editFcm');
    Route::POST('/settings/fcm', 'UiStacks\Settings\Controllers\SettingsController@updateFcm');
    Route::GET('/settings/sms', 'UiStacks\Settings\Controllers\SettingsController@editSms');
    Route::POST('/settings/sms', 'UiStacks\Settings\Controllers\SettingsController@updateSms');
    Route::GET('/settings/mode', 'UiStacks\Settings\Controllers\SettingsController@editMaintenanceMode');
    Route::POST('/settings/mode', 'UiStacks\Settings\Controllers\SettingsController@updateMaintenanceMode');
    Route::GET('/settings/bank', 'UiStacks\Settings\Controllers\SettingsController@editBankInformation');
    Route::POST('/settings/bank', 'UiStacks\Settings\Controllers\SettingsController@updateBankInformation');
});