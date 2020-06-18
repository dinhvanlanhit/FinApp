<?php
Route::group(['namespace' => 'App',], function () {
    Route::get('/login','LoginController@getLogin')->name('login');
    Route::post('/login','LoginController@postLogin')->name('login');
    Route::get('/logout','LoginController@getLogout')->name('logout');
});
Route::group(['namespace' => 'App','middleware' => ['CheckAuth']],function (){
    Route::get('/profile','ProfileController@getProfile')->name('profile');

    Route::get('/','DashboardController@Dashboard')->name('dashboard');
    Route::get('/setting','SettingController@getSetting')->name('setting');
    Route::get('/news','NewsController@getNews')->name('news');
});