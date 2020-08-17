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
    Route::get('404','ErrorController@get404')->name('404');
    Route::group(['middleware' => ['CheckExpiration']],function (){
        Route::group(['prefix' => 'event'], function () {
            Route::get('/datatable','EventController@getDatatable')->name('event_table');
            Route::get('/','EventController@getEvent')->name('event')->middleware('CheckMBSPMS:event_view');
            Route::post('/insert','EventController@postInsert')->name('event_insert')->middleware('CheckMBSPMS:event_insert');
            Route::post('/update','EventController@postUpdate')->name('event_update')->middleware('CheckMBSPMS:event_update');
            Route::get('/update','EventController@getUpdate')->name('event_update')->middleware('CheckMBSPMS:event_update');
            Route::post('/delete','EventController@postDelete')->name('event_delete')->middleware('CheckMBSPMS:event_delete');
        });
        // 
        Route::group(['prefix' => 'cost'], function () {
            Route::get('/datatable','CostController@getDatatable')->name('cost_table');
            Route::get('/','CostController@getCost')->name('cost')->middleware('CheckMBSPMS:cost_view');
            Route::post('/insert','CostController@postInsert')->name('cost_insert')->middleware('CheckMBSPMS:cost_insert');
            Route::post('/update','CostController@postUpdate')->name('cost_update')->middleware('CheckMBSPMS:cost_update');
            Route::get('/update','CostController@getUpdate')->name('cost_update')->middleware('CheckMBSPMS:cost_update');
            Route::post('/delete','CostController@postDelete')->name('cost_delete')->middleware('CheckMBSPMS:cost_delete');
        });
        Route::group(['prefix' => 'shopping'], function () {
            Route::get('/datatable','ShoppingController@getDatatable')->name('shopping_table');
            Route::get('/','ShoppingController@getShopping')->name('shopping')->middleware('CheckMBSPMS:shopping_view');
            Route::post('/insert','ShoppingController@postInsert')->name('shopping_insert')->middleware('CheckMBSPMS:shopping_insert');
            Route::post('/update','ShoppingController@postUpdate')->name('shopping_update')->middleware('CheckMBSPMS:shopping_update');
            Route::get('/update','ShoppingController@getUpdate')->name('shopping_update')->middleware('CheckMBSPMS:shopping_update');
            Route::post('/delete','ShoppingController@postDelete')->name('shopping_delete')->middleware('CheckMBSPMS:shopping_delete');
        });
        Route::group(['prefix' => 'salary'], function () {
            Route::get('/datatable','SalaryController@getDatatable')->name('salary_table');
            Route::get('/','SalaryController@getSalary')->name('salary')->middleware('CheckMBSPMS:salary_view');
            Route::post('/insert','SalaryController@postInsert')->name('salary_insert')->middleware('CheckMBSPMS:salary_insert');
            Route::post('/update','SalaryController@postUpdate')->name('salary_update')->middleware('CheckMBSPMS:salary_update');
            Route::get('/update','SalaryController@getUpdate')->name('salary_update')->middleware('CheckMBSPMS:salary_update');
            Route::post('/delete','SalaryController@postDelete')->name('salary_delete')->middleware('CheckMBSPMS:salary_delete');
        });
        Route::group(['prefix' => 'debt'], function () {
            Route::get('/datatable','DebtController@getDatatable')->name('debt_table');
            Route::get('/','DebtController@getDebt')->name('debt')->middleware('CheckMBSPMS:debt_view');
            Route::post('/insert','DebtController@postInsert')->name('debt_insert')->middleware('CheckMBSPMS:debt_insert');
            Route::post('/update','DebtController@postUpdate')->name('debt_update')->middleware('CheckMBSPMS:debt_update');
            Route::get('/update','DebtController@getUpdate')->name('debt_update')->middleware('CheckMBSPMS:debt_update');
            Route::post('/delete','DebtController@postDelete')->name('debt_delete')->middleware('CheckMBSPMS:debt_delete');
        });
        Route::group(['prefix' => 'lendloan'], function () {
            Route::get('/datatable','LendloanController@getDatatable')->name('lendloan_table');
            Route::get('/','LendloanController@getLendloan')->name('lendloan')->middleware('CheckMBSPMS:lendloan_view');
            Route::post('/insert','LendloanController@postInsert')->name('lendloan_insert')->middleware('CheckMBSPMS:lendloan_insert');
            Route::post('/update','LendloanController@postUpdate')->name('lendloan_update')->middleware('CheckMBSPMS:lendloan_update');
            Route::get('/update','LendloanController@getUpdate')->name('lendloan_update')->middleware('CheckMBSPMS:lendloan_update');
            Route::post('/delete','LendloanController@postDelete')->name('lendloan_delete')->middleware('CheckMBSPMS:lendloan_delete');
        });
        Route::group(['prefix' => 'invest'], function () {
            Route::get('/datatable','InvestController@getDatatable')->name('invest_table');
            Route::get('/','InvestController@getInvest')->name('invest')->middleware('CheckMBSPMS:invest_view');
            Route::post('/insert','InvestController@postInsert')->name('invest_insert')->middleware('CheckMBSPMS:invest_insert');
            Route::post('/update','InvestController@postUpdate')->name('invest_update')->middleware('CheckMBSPMS:invest_update');
            Route::get('/update','InvestController@getUpdate')->name('invest_update')->middleware('CheckMBSPMS:invest_update');
            Route::post('/delete','InvestController@postDelete')->name('invest_delete')->middleware('CheckMBSPMS:invest_delete');
        });
        Route::group(['prefix' => 'goals_dreams'], function () {
            Route::get('/datatable','Goals_dreamsController@getDatatable')->name('goals_dreams_table');
            Route::get('/','Goals_dreamsController@getGoals_dreams')->name('goals_dreams')->middleware('CheckMBSPMS:goals_dreams_view');
            Route::post('/insert','Goals_dreamsController@postInsert')->name('goals_dreams_insert')->middleware('CheckMBSPMS:goals_dreams_insert');
            Route::post('/update','Goals_dreamsController@postUpdate')->name('goals_dreams_update')->middleware('CheckMBSPMS:goals_dreams_update');
            Route::get('/update','Goals_dreamsController@getUpdate')->name('goals_dreams_update')->middleware('CheckMBSPMS:goals_dreams_update');
            Route::post('/delete','Goals_dreamsController@postDelete')->name('goals_dreams_delete')->middleware('CheckMBSPMS:goals_dreams_delete');
        });
        Route::group(['prefix' => 'wallet'], function () {
            Route::get('/datatable','WalletController@getDatatable')->name('wallet_table');
            Route::get('/','WalletController@getWallet')->name('wallet')->middleware('CheckMBSPMS:wallet_view');
            Route::post('/insert','WalletController@postInsert')->name('wallet_insert')->middleware('CheckMBSPMS:wallet_insert');
            Route::post('/update','WalletController@postUpdate')->name('wallet_update')->middleware('CheckMBSPMS:wallet_update');
            Route::get('/update','WalletController@getUpdate')->name('wallet_update')->middleware('CheckMBSPMS:wallet_update');
            Route::post('/delete','WalletController@postDelete')->name('wallet_delete')->middleware('CheckMBSPMS:wallet_delete');
            Route::get('/total','WalletController@getTotal')->name('wallet_total');
            Route::get('/test','WalletController@datatable')->name('test');
        });
        Route::group(['prefix' => 'asset'], function () {
            Route::get('/datatable','AssetController@getDatatable')->name('asset_table');
            Route::get('/','AssetController@getAsset')->name('asset')->middleware('CheckMBSPMS:asset_view');
            Route::post('/insert','AssetController@postInsert')->name('asset_insert')->middleware('CheckMBSPMS:asset_insert');
            Route::post('/update','AssetController@postUpdate')->name('asset_update')->middleware('CheckMBSPMS:asset_update');
            Route::get('/update','AssetController@getUpdate')->name('asset_update')->middleware('CheckMBSPMS:asset_update');
            Route::post('/delete','AssetController@postDelete')->name('asset_delete')->middleware('CheckMBSPMS:asset_delete');
        });
        Route::group(['prefix' => 'group-my-event'], function () {
            Route::get('/datatable','GroupMyEventController@getDatatable')->name('groupmyevent_table');
            Route::get('/','GroupMyEventController@getGroupMyEvent')->name('groupmyevent')->middleware('CheckMBSPMS:group_my_event_view');
            Route::post('/insert','GroupMyEventController@postInsert')->name('groupmyevent_insert')->middleware('CheckMBSPMS:group_my_event_insert');
            Route::post('/update','GroupMyEventController@postUpdate')->name('groupmyevent_update')->middleware('CheckMBSPMS:group_my_event_update');
            Route::get('/update','GroupMyEventController@getUpdate')->name('groupmyevent_update')->middleware('CheckMBSPMS:group_my_event_update');
            Route::post('/delete','GroupMyEventController@postDelete')->name('groupmyevent_delete')->middleware('CheckMBSPMS:group_my_event_delete');
        });
        Route::group(['prefix' => 'my-event'], function () {
            Route::get('/datatable','MyEventController@getDatatable')->name('myevent_table');
            Route::get('/','MyEventController@getMyEvent')->name('myevent')->middleware('CheckMBSPMS:my_event_view');
            Route::post('/insert','MyEventController@postInsert')->name('myevent_insert')->middleware('CheckMBSPMS:my_event_insert');
            Route::post('/update','MyEventController@postUpdate')->name('myevent_update')->middleware('CheckMBSPMS:my_event_update');
            Route::get('/update','MyEventController@getUpdate')->name('myevent_update')->middleware('CheckMBSPMS:my_event_update');
            Route::post('/delete','MyEventController@postDelete')->name('myevent_delete')->middleware('CheckMBSPMS:my_event_delete');
            Route::post('/export','MyEventController@postExport')->name('myevent_export');
            
        });

        Route::group(['middleware' => ['CheckMemberShip']],function (){
            Route::group(['prefix' => 'membership'], function () {
                Route::get('/datatable','MembershipController@getDatatable')->name('membership_datatable');
                Route::get('/','MembershipController@getMembership')->name('membership');
                Route::post('/insert','MembershipController@postInsert')->name('membership_insert');
                Route::post('/update','MembershipController@postUpdate')->name('membership_update');
                Route::get('/update','MembershipController@getUpdate')->name('membership_update');
                Route::post('/delete','MembershipController@postDelete')->name('membership_delete');
                Route::get('/permission/{id?}','MembershipController@getPermission')->name('membership_permission');
                Route::post('/permission','MembershipController@postPermission')->name('membership_permission');
            });
        });
    });
    Route::group(['middleware' => ['CheckMemberShip']],function (){
        Route::group(['prefix' => 'payment'], function (){
            Route::get('history','PaymentController@getPayMent')->name('history_payment');
            Route::get('history-datatable','PaymentController@getDatatable')->name('history_datatable');
            Route::get('notice','PaymentController@getNotice')->name('notice_payment');
            Route::get('methods','PaymentController@getMethods')->name('methods_payment');
        }); 
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





