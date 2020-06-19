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
    Route::group(['prefix' => 'birthday'], function () {
        Route::get('/datatable','BirthdayController@getDatatable')->name('birthday_table');
        Route::get('/','BirthdayController@getBirthday')->name('birthday');
        Route::post('/insert','BirthdayController@postInsert')->name('birthday_insert');
        Route::post('/update','BirthdayController@postUpdate')->name('birthday_update');
        Route::get('/update','BirthdayController@getUpdate')->name('birthday_update');
        Route::post('/delete','BirthdayController@postDelete')->name('birthday_delete');
    });
    Route::group(['prefix' => 'shopping'], function () {
        Route::get('/datatable','ShoppingController@getDatatable')->name('shopping_table');
        Route::get('/','ShoppingController@getShopping')->name('shopping');
        Route::post('/insert','ShoppingController@postInsert')->name('shopping_insert');
        Route::post('/update','ShoppingController@postUpdate')->name('shopping_update');
        Route::get('/update','ShoppingController@getUpdate')->name('shopping_update');
        Route::post('/delete','ShoppingController@postDelete')->name('shopping_delete');
    });
    Route::group(['prefix' => 'salary'], function () {
        Route::get('/datatable','SalaryController@getDatatable')->name('salary_table');
        Route::get('/','SalaryController@getSalary')->name('salary');
        Route::post('/insert','SalaryController@postInsert')->name('salary_insert');
        Route::post('/update','SalaryController@postUpdate')->name('salary_update');
        Route::get('/update','SalaryController@getUpdate')->name('salary_update');
        Route::post('/delete','SalaryController@postDelete')->name('salary_delete');
    });
    Route::group(['prefix' => 'other_salaries'], function () {
        Route::get('/datatable','Other_salariesController@getDatatable')->name('other_salaries_table');
        Route::get('/','Other_salariesController@getOther_salaries')->name('other_salaries');
        Route::post('/insert','Other_salariesController@postInsert')->name('other_salaries_insert');
        Route::post('/update','Other_salariesController@postUpdate')->name('other_salaries_update');
        Route::get('/update','Other_salariesController@getUpdate')->name('other_salaries_update');
        Route::post('/delete','Other_salariesController@postDelete')->name('other_salaries_delete');
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
