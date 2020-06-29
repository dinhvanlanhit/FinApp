<?php
Route::group(['namespace' => 'AdminApp','prefix' => 'app','middleware' => ['CheckAuthSystem']], function () {
    Route::get('dashboard','DashboardController@Dashboard')->name('admin_dashboard');
    Route::get('admin-dashboard','DashboardController@getDashboard')->name('admin_getDashboard');
    Route::get('admin-chart-dashboard','DashboardController@getCharDashboard')->name('admin_getCharDashboard');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('admin-profile','ProfileController@getProfile')->name('admin_profile');
        Route::post('admin-profile','ProfileController@postProfile')->name('admin_profile');
        Route::post('admin-uploadFile','ProfileController@uploadFile')->name('admin_uploadFile');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('admin-users','UsersController@getIndex')->name('admin_users');
        Route::get('admin-users-datatable','UsersController@getDatatable')->name('admin_users_datatable');
        Route::get('admin-users-update/{id?}','UsersController@getUpdate')->name('admin_users_update');
        Route::post('admin-users-update','UsersController@postUpdate')->name('admin_users_update');
        Route::get('admin-users-insert','UsersController@getInsert')->name('admin_users_insert');
        Route::post('admin-users-insert','UsersController@postInsert')->name('admin_users_insert');
        Route::post('admin-users-delete','UsersController@postDelete')->name('admin_users_delete');
        Route::post('admin-users-status','UsersController@postUpdate')->name('admin_users_status');
    });
    Route::group(['prefix' => 'payment'], function (){
        Route::get('admin-users-payment/{id?}','PaymentController@getPayMent')->name('admin_users_payment');
        Route::get('admin-payment-datatable','PaymentController@getDatatable')->name('admin_payment_datatable');
        Route::get('admin-payment-update/{id?}','PaymentController@getUpdate')->name('admin_payment_update');
        Route::post('admin-payment-update','PaymentController@postUpdate')->name('admin_payment_update');
        Route::get('admin-payment-insert','PaymentController@getInsert')->name('admin_payment_insert');
        Route::post('admin-payment-insert','PaymentController@postInsert')->name('admin_payment_insert');
        Route::post('admin-payment-delete','PaymentController@postDelete')->name('admin_payment_delete');
        Route::post('admin-payment-status','PaymentController@postUpdate')->name('admin_payment_status');
    }); 
    Route::group(['prefix' => 'setting'], function (){
        Route::get('admin-setting','SettingsController@getSetting')->name('admin_setting');
        Route::post('admin-setting','SettingsController@postSetting')->name('admin_setting');
        Route::post('admin-setting-upload','SettingsController@postUpload')->name('admin_setting_upload');
    }); 
    Route::group(['prefix' => 'contact'], function (){
        Route::get('admin-contact','ContactController@getContact')->name('admin_contact');
        Route::get('admin-contact-datatable','ContactController@getDatatable')->name('admin_contact_datatable');
        Route::post('admin-contact-delete','ContactController@postDelete')->name('admin_contact_delete');
        Route::post('admin-contact-status','ContactController@postStatus')->name('admin_contact_status');
    }); 
});


