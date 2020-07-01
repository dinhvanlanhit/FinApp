<?php
Route::group(['namespace' => 'AdminApp','prefix' => 'app','middleware' => ['CheckAuthSystem']], function () {
    Route::get('dashboard','DashboardController@Dashboard')->name('admin_dashboard');
    Route::get('admin-dashboard','DashboardController@getDashboard')->name('admin_getDashboard');
    Route::get('admin-chart-dashboard','DashboardController@getCharDashboard')->name('admin_getCharDashboard');
    Route::get('admin-404','ErrorController@get404')->name('admin_404');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('admin-profile','ProfileController@getProfile')->name('admin_profile');
        Route::post('admin-profile','ProfileController@postProfile')->name('admin_profile');
        Route::post('admin-uploadFile','ProfileController@uploadFile')->name('admin_uploadFile');
        Route::post('/admin-change-password','ProfileController@postChangePassword')->name('admin-change-password');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('admin-users','UsersController@getIndex')->name('admin_users')->middleware('CheckPermission:users_view');
        Route::get('admin-users-datatable','UsersController@getDatatable')->name('admin_users_datatable');
        Route::get('admin-users-update/{id?}','UsersController@getUpdate')->name('admin_users_update')->middleware('CheckPermission:users_update');
        Route::post('admin-users-update','UsersController@postUpdate')->name('admin_users_update')->middleware('CheckPermission:users_update');
        Route::get('admin-users-insert','UsersController@getInsert')->name('admin_users_insert')->middleware('CheckPermission:users_insert');
        Route::post('admin-users-insert','UsersController@postInsert')->name('admin_users_insert')->middleware('CheckPermission:users_insert');
        Route::post('admin-users-delete','UsersController@postDelete')->name('admin_users_delete')->middleware('CheckPermission:users_delete');
        Route::post('admin-users-status','UsersController@postUpdate')->name('admin_users_status')->middleware('CheckPermission:users_status');
        Route::get('admin-users-view/{id?}','UsersController@viewUsers')->name('users_data_view')->middleware('CheckPermission:users_data_view');
        
    });
    Route::group(['prefix' => 'payment'], function (){
        Route::get('admin-users-payment/{id?}','PaymentController@getPayMent')->name('admin_users_payment')->middleware('CheckPermission:payment_view');
        Route::get('admin-payment-datatable','PaymentController@getDatatable')->name('admin_payment_datatable');
        Route::get('admin-payment-update/{id?}','PaymentController@getUpdate')->name('admin_payment_update')->middleware('CheckPermission:payment_update');
        Route::post('admin-payment-update','PaymentController@postUpdate')->name('admin_payment_update')->middleware('CheckPermission:payment_update');
        Route::get('admin-payment-insert','PaymentController@getInsert')->name('admin_payment_insert')->middleware('CheckPermission:payment_insert');
        Route::post('admin-payment-insert','PaymentController@postInsert')->name('admin_payment_insert')->middleware('CheckPermission:payment_insert');
        Route::post('admin-payment-delete','PaymentController@postDelete')->name('admin_payment_delete')->middleware('CheckPermission:payment_delete');
        Route::post('admin-payment-status','PaymentController@postUpdate')->name('admin_payment_status');
    }); 
    Route::group(['prefix' => 'setting'], function (){
        Route::get('admin-setting','SettingsController@getSetting')->name('admin_setting')->middleware('CheckPermission:setting_view');
        Route::post('admin-setting','SettingsController@postSetting')->name('admin_setting')->middleware('CheckPermission:setting_update');
        Route::post('admin-setting-upload','SettingsController@postUpload')->name('admin_setting_upload')->middleware('CheckPermission:setting_update');
    }); 
    Route::group(['prefix' => 'contact'], function (){
        Route::get('admin-contact','ContactController@getContact')->name('admin_contact')->middleware('CheckPermission:contact_view');
        Route::get('admin-contact-datatable','ContactController@getDatatable')->name('admin_contact_datatable');
        Route::post('admin-contact-delete','ContactController@postDelete')->name('admin_contact_delete')->middleware('CheckPermission:contact_delete');
        Route::post('admin-contact-status','ContactController@postStatus')->name('admin_contact_status')->middleware('CheckPermission:contact_status');
    }); 
    Route::group(['prefix' => 'roles'], function (){
        Route::get('admin-roles','RolesController@getRoles')->name('admin_roles')->middleware('CheckPermission:roles_view');
        Route::get('admin-roles-datatable','RolesController@getDatatable')->name('admin_roles_datatable');
        Route::post('admin-contact-delete','RolesController@postDelete')->name('admin_roles_delete')->middleware('CheckPermission:roles_delete');
        Route::post('admin-contact-update','RolesController@postUpdate')->name('admin_roles_update')->middleware('CheckPermission:roles_update');
        Route::get('admin-contact-update','RolesController@getUpdate')->name('admin_roles_update')->middleware('CheckPermission:roles_update');
        Route::post('admin-contact-insert','RolesController@postInsert')->name('admin_roles_insert')->middleware('CheckPermission:roles_insert');
        Route::get('admin-roles-permission/{id?}','RolesController@getPermission')->name('admin_roles_permission')->middleware('CheckPermission:roles_update');
        Route::post('admin-roles-permission','RolesController@postPermission')->name('admin_roles_permission')->middleware('CheckPermission:roles_update');
    }); 
});

