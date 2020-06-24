<?php
Route::group(['namespace' => 'AdminApp','prefix' => 'app'], function () {
    Route::get('login','LoginController@getLogin')->name('admin_login');
    Route::post('admin-login','LoginController@postLogin')->name('admin_login');
    Route::get('admin-logout','LoginController@getLogout')->name('admin_logout');
    Route::get('admin-register','RegisterController@getRegister')->name('admin_register');
    Route::post('admin-register','RegisterController@postRegister')->name('admin_register');
    Route::get('admin-forgot-password','RegisterController@getForgotPassword')->name('admin_forgot_password');
    Route::post('admin-forgot-password','RegisterController@getForgotPassword')->name('admin_forgot_password');
});
Route::group(['namespace' => 'AdminApp'], function () {
    Route::group(['prefix' => 'app'], function () {
        Route::get('dashboard','DashboardController@Dashboard')->name('admin_dashboard');
        Route::get('admin-dashboard','DashboardController@getDashboard')->name('admin_getDashboard');
        Route::get('admin-chart-dashboard','DashboardController@getCharDashboard')->name('admin_getCharDashboard');

        Route::group(['prefix' => 'profile'], function () {
            Route::get('admin-profile','ProfileController@getProfile')->name('admin_profile');
            Route::post('admin-profile','ProfileController@postProfile')->name('admin_profile');
            Route::post('admin-uploadFile','ProfileController@uploadFile')->name('admin_uploadFile');
        });
    });
});



