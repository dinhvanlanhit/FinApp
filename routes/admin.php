<?php
Route::group(['namespace' => 'AdminApp','prefix' => 'app'], function () {
    Route::get('/','LoginController@getLogin')->name('admin_login');
    Route::get('/login','LoginController@getLogin')->name('admin_login');
    Route::post('/login','LoginController@postLogin')->name('admin_login');
    Route::get('/logout','LoginController@getLogout')->name('admin_logout');
    Route::get('/register','RegisterController@getRegister')->name('admin_register');
    Route::post('/register','RegisterController@postRegister')->name('admin_register');
    Route::get('/forgot-password','RegisterController@getForgotPassword')->name('admin_forgot_password');
    Route::post('/forgot-password','RegisterController@getForgotPassword')->name('admin_forgot_password');
});