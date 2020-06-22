<?php
Route::group(['namespace' => 'App',], function () {
    Route::get('/login','LoginController@getLogin')->name('login');
    Route::post('/login','LoginController@postLogin')->name('login');
    Route::get('/logout','LoginController@getLogout')->name('logout');

    Route::get('/register','RegisterController@getRegister')->name('register');
    Route::post('/register','RegisterController@postRegister')->name('register');

    Route::get('/forgot-password','RegisterController@getForgot_password')->name('forgot-password');
    Route::post('/forgot-password','RegisterController@postForgot_password')->name('forgot-password');

    
});
Route::group(['namespace' => 'App','middleware' => ['CheckAuth']],function (){
    Route::get('/','DashboardController@Dashboard')->name('dashboard');
    Route::get('/chart','DashboardController@getDashboard')->name('getDashboard');
    Route::get('/char-dashboard','DashboardController@getCharDashboard')->name('getCharDashboard');
    Route::group(['prefix' => 'setting'], function () {
        Route::get('/setting','SettingController@getSetting')->name('setting');
    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('/','NewsController@getNews')->name('news');
    });
    Route::group(['prefix' => 'event'], function () {
        Route::get('/datatable','EventController@getDatatable')->name('event_table');
        Route::get('/','EventController@getEvent')->name('event');
        Route::post('/insert','EventController@postInsert')->name('event_insert');
        Route::post('/update','EventController@postUpdate')->name('event_update');
        Route::get('/update','EventController@getUpdate')->name('event_update');
        Route::post('/delete','EventController@postDelete')->name('event_delete');
    });
    Route::group(['prefix' => 'cost'], function () {
        Route::get('/datatable','CostController@getDatatable')->name('cost_table');
        Route::get('/','CostController@getCost')->name('cost');
        Route::post('/insert','CostController@postInsert')->name('cost_insert');
        Route::post('/update','CostController@postUpdate')->name('cost_update');
        Route::get('/update','CostController@getUpdate')->name('cost_update');
        Route::post('/delete','CostController@postDelete')->name('cost_delete');
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
    Route::group(['prefix' => 'debt'], function () {
        Route::get('/datatable','DebtController@getDatatable')->name('debt_table');
        Route::get('/','DebtController@getDebt')->name('debt');
        Route::post('/insert','DebtController@postInsert')->name('debt_insert');
        Route::post('/update','DebtController@postUpdate')->name('debt_update');
        Route::get('/update','DebtController@getUpdate')->name('debt_update');
        Route::post('/delete','DebtController@postDelete')->name('debt_delete');
    });
    Route::group(['prefix' => 'lendloan'], function () {
        Route::get('/datatable','LendloanController@getDatatable')->name('lendloan_table');
        Route::get('/','LendloanController@getLendloan')->name('lendloan');
        Route::post('/insert','LendloanController@postInsert')->name('lendloan_insert');
        Route::post('/update','LendloanController@postUpdate')->name('lendloan_update');
        Route::get('/update','LendloanController@getUpdate')->name('lendloan_update');
        Route::post('/delete','LendloanController@postDelete')->name('lendloan_delete');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/','ProfileController@getProfile')->name('profile');
        Route::post('/','ProfileController@postProfile')->name('profile');
        Route::post('/uploadFile','ProfileController@uploadFile')->name('uploadFile');
    });
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/','MenuController@getMenu')->name('menu');
    });
    
});

Route::get('/mobile',function(){
    return view('welcome');
});
