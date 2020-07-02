<?php

Route::group(['namespace' => 'App'], function () {
    Route::get('/login','LoginController@getLogin')->name('login');
    Route::post('/login','LoginController@postLogin')->name('login');
    Route::get('/logout','LoginController@getLogout')->name('logout');
    Route::get('/register','RegisterController@getRegister')->name('register');
    Route::post('/register','RegisterController@postRegister')->name('register');
    

    Route::get('/redirect/{provider?}', 'SocialController@redirectToProvider')->name('login-redirect');
    Route::get('/callback/{provider?}', 'SocialController@handleProviderCallback')->name('login-callback');
    
    Route::get('/forgot-password','RegisterController@getForgotPassword')->name('forgot-password');
    Route::post('/sendEmail','RegisterController@sendEmail')->name('sendEmail');

    Route::get('/recover/code','RegisterController@getRecovercode')->name('recover_code');
    Route::post('/recover/code','RegisterController@postRecovercode')->name('recover_code');
    
    Route::get('recover/password/','RegisterController@getPassword')->name('password');
    Route::post('recover/password/','RegisterController@postPassword')->name('password');

    

});
Route::group(['namespace' => 'App','middleware' => ['CheckAuth']],function (){
    Route::get('/','DashboardController@Dashboard')->name('dashboard');
    Route::get('/chart','DashboardController@getDashboard')->name('getDashboard');
    Route::get('/char-dashboard','DashboardController@getCharDashboard')->name('getCharDashboard');
    Route::post('/export-dashboard','DashboardController@postExport')->name('export');
    Route::group(['middleware' => ['CheckExpiration']],function (){
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
        Route::group(['prefix' => 'invest'], function () {
            Route::get('/datatable','InvestController@getDatatable')->name('invest_table');
            Route::get('/','InvestController@getInvest')->name('invest');
            Route::post('/insert','InvestController@postInsert')->name('invest_insert');
            Route::post('/update','InvestController@postUpdate')->name('invest_update');
            Route::get('/update','InvestController@getUpdate')->name('invest_update');
            Route::post('/delete','InvestController@postDelete')->name('invest_delete');
        });
        Route::group(['prefix' => 'goals_dreams'], function () {
            Route::get('/datatable','Goals_dreamsController@getDatatable')->name('goals_dreams_table');
            Route::get('/','Goals_dreamsController@getGoals_dreams')->name('goals_dreams');
            Route::post('/insert','Goals_dreamsController@postInsert')->name('goals_dreams_insert');
            Route::post('/update','Goals_dreamsController@postUpdate')->name('goals_dreams_update');
            Route::get('/update','Goals_dreamsController@getUpdate')->name('goals_dreams_update');
            Route::post('/delete','Goals_dreamsController@postDelete')->name('goals_dreams_delete');
        });
        Route::group(['prefix' => 'wallet'], function () {
            Route::get('/datatable','WalletController@getDatatable')->name('wallet_table');
            Route::get('/','WalletController@getWallet')->name('wallet');
            Route::post('/insert','WalletController@postInsert')->name('wallet_insert');
            Route::post('/update','WalletController@postUpdate')->name('wallet_update');
            Route::get('/update','WalletController@getUpdate')->name('wallet_update');
            Route::post('/delete','WalletController@postDelete')->name('wallet_delete');
            Route::get('/total','WalletController@getTotal')->name('wallet_total');
            Route::get('/test','WalletController@datatable')->name('test');
        });
        Route::group(['prefix' => 'asset'], function () {
            Route::get('/datatable','AssetController@getDatatable')->name('asset_table');
            Route::get('/','AssetController@getAsset')->name('asset');
            Route::post('/insert','AssetController@postInsert')->name('asset_insert');
            Route::post('/update','AssetController@postUpdate')->name('asset_update');
            Route::get('/update','AssetController@getUpdate')->name('asset_update');
            Route::post('/delete','AssetController@postDelete')->name('asset_delete');
        });
        Route::group(['prefix' => 'group-my-event'], function () {
            Route::get('/datatable','GroupMyEventController@getDatatable')->name('groupmyevent_table');
            Route::get('/','GroupMyEventController@getGroupMyEvent')->name('groupmyevent');
            Route::post('/insert','GroupMyEventController@postInsert')->name('groupmyevent_insert');
            Route::post('/update','GroupMyEventController@postUpdate')->name('groupmyevent_update');
            Route::get('/update','GroupMyEventController@getUpdate')->name('groupmyevent_update');
            Route::post('/delete','GroupMyEventController@postDelete')->name('groupmyevent_delete');
        });
        Route::group(['prefix' => 'my-event'], function () {
            Route::get('/datatable','MyEventController@getDatatable')->name('myevent_table');
            Route::get('/','MyEventController@getMyEvent')->name('myevent');
            Route::post('/insert','MyEventController@postInsert')->name('myevent_insert');
            Route::post('/update','MyEventController@postUpdate')->name('myevent_update');
            Route::get('/update','MyEventController@getUpdate')->name('myevent_update');
            Route::post('/delete','MyEventController@postDelete')->name('myevent_delete');
            Route::post('/export','MyEventController@postExport')->name('myevent_export');
            
        });
        Route::group(['prefix' => 'membership'], function () {
            Route::get('/datatable','Membership@getDatatable')->name('membership_table');
            Route::get('/','Membership@getMembership')->name('membership');
            Route::post('/insert','Membership@postInsert')->name('membership_insert');
            Route::post('/update','Membership@postUpdate')->name('membership_update');
            Route::get('/update','Membership@getUpdate')->name('membership_update');
            Route::post('/delete','Membership@postDelete')->name('membership_delete');
            Route::post('/export','Membership@postExport')->name('membership_export');
        });
        
    });
    Route::group(['prefix' => 'payment'], function (){
        Route::get('history','PaymentController@getPayMent')->name('history_payment');
        Route::get('history-datatable','PaymentController@getDatatable')->name('history_datatable');
        Route::get('notice','PaymentController@getNotice')->name('notice_payment');
        Route::get('methods','PaymentController@getMethods')->name('methods_payment');
    }); 
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/','ProfileController@getProfile')->name('profile');
        Route::post('/','ProfileController@postProfile')->name('profile');
        Route::post('/uploadFile','ProfileController@uploadFile')->name('uploadFile');
        Route::post('/change-password','ProfileController@postChangePassword')->name('change-password');
        
    });
    Route::group(['prefix' => 'contact'], function (){
        Route::get('/','ContactController@getContact')->name('contact');
        Route::post('contact-send','ContactController@postContact')->name('contact_send');
       
    });  
    
});
Route::get('/mobile',function(){
    return view('welcome');
});





