<?php
Route::group(['namespace' => 'App',], function () {
    Route::get('/login','LoginController@getLogin')->name('login');
    Route::post('/login','LoginController@postLogin')->name('login');
    Route::get('/logout','LoginController@getLogout')->name('logout');
});
Route::group(['namespace' => 'App','middleware' => ['CheckAuth']],function (){
    Route::get('/','DashboardController@Dashboard')->name('dashboard');
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/setting','SettingController@getSetting')->name('setting');
    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('/','NewsController@getNews')->name('news');
    });
    Route::group(['prefix' => 'wedding'], function () {
        Route::get('/datatable','WeddingController@getDatatable')->name('wedding_table');
        Route::get('/','WeddingController@getWedding')->name('wedding');
        Route::post('/insert','WeddingController@postInsert')->name('wedding_insert');
        Route::post('/update','WeddingController@postUpdate')->name('wedding_update');
        Route::get('/update','WeddingController@getUpdate')->name('wedding_update');
        Route::post('/delete','WeddingController@postDelete')->name('wedding_delete');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/','ProfileController@getNews')->name('profile');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/','MenuController@getMenu')->name('menu');
    });
    
});

Route::get('/mobile',function(){
    return view('welcome');
});
