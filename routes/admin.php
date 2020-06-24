<?php

Route::group(['namespace' => 'AdminApp','prefix' => 'app'], function () {
    Route::get('/dashboard','DashboardController@Dashboard')->name('admin_dashboard');
    Route::get('/admin-dashboard','DashboardController@getDashboard')->name('admin_getDashboard');
    Route::get('/admin-chart-dashboard','DashboardController@getCharDashboard')->name('admin_getCharDashboard');
});
Route::group(['namespace' => 'AdminApp','prefix' => 'app'], function () {
    Route::get('/login','LoginController@getLogin')->name('admin_login');
    Route::post('/login','LoginController@postLogin')->name('admin_login');
    Route::get('/logout','LoginController@getLogout')->name('admin_logout');
    Route::get('/register','RegisterController@getRegister')->name('admin_register');
    Route::post('/register','RegisterController@postRegister')->name('admin_register');
    Route::get('/forgot-password','RegisterController@getForgotPassword')->name('admin_forgot_password');
    Route::post('/forgot-password','RegisterController@getForgotPassword')->name('admin_forgot_password');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/profile','DashboardController@Dashboard')->name('admin_profile');
        Route::post('/admin-profile','DashboardController@getDashboard')->name('admin_profile');
    });
});



