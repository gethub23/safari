<?php
//    Auth::loginUsingId(1) ;

    Route::group(['middleware' => ['admin', 'check_role']], function () {
        // ============= home ==============
            Route::get('/', [
                'uses'      => 'AuthController@dashboard',
                'as'        => 'dashboard',
                'icon'      => '<i class="fa fa-home" aria-hidden="true"></i>',
                'title'     => 'الرئيسيه',
                'type'      => 'parent',
            ]);
        // ============= #home =============

        // ============= intros ==============
            Route::get('/intros',[
                'uses'      =>'IntrosController@index',
                'as'        =>'intros_index',
                'icon'      =>'<i class="fa fa-camera-retro" aria-hidden="true"></i>',
                'title'     => 'صفحات المقدمه',
                'type'      =>'parent',
                'child' => [
                    'intros_store',
                    'intros_update',
                    'intros_destroy',
                    'delete_intros',
                ]
            ]);
            // Add intros
            Route::post('/intros', [
                'uses'      => 'IntrosController@store',
                'as'        => 'intros_store',
                'title'     => 'اضافة صفحه مقدمه'
            ]);
            // Update intros
            Route::put('/intros/{id}', [
                'uses'      => 'IntrosController@update',
                'as'        => 'intros_update',
                'title'     => 'تعديل صفحه مقدمه'
            ]);
            // Delete intros
            Route::delete('/intros/{id}', [
                'uses'      => 'IntrosController@destroy',
                'as'        => 'intros_destroy',
                'title'     => 'حذف صفحه مقدمه'
            ]);
            // Delete all Users
            Route::post('/intros/deleteAll', [
                'uses'      => 'IntrosController@deleteAll',
                'as'        => 'delete_intros',
                'title'     => 'حذف اكتر من صفحه مقدمه'
            ]);
        // ============= #banners ==============

        // ============= banners ==============
            Route::get('/banners',[
                'uses'      =>'BannersController@index',
                'as'        =>'banners_index',
                'icon'      =>'<i class="fa fa-camera-retro" aria-hidden="true"></i>',
                'title'     => 'بنرات اعلان',
                'type'      =>'parent',
                'child' => [
                    'banners_store',
                    'banners_update',
                    'banners_destroy',
                    'delete_banners',
                ]
            ]);
            // Add banners
            Route::post('/banners', [
                'uses'      => 'BannersController@store',
                'as'        => 'banners_store',
                'title'     => 'اضافة بانر اعلاني'
            ]);
            // Update banners
            Route::put('/banners/{id}', [
                'uses'      => 'BannersController@update',
                'as'        => 'banners_update',
                'title'     => 'تعديل بانر اعلاني'
            ]);
            // Delete banners
            Route::delete('/banners/{id}', [
                'uses'      => 'BannersController@destroy',
                'as'        => 'banners_destroy',
                'title'     => 'حذف بانر اعلاني'
            ]);
            // Delete all Users
            Route::post('/banners/deleteAll', [
                'uses'      => 'BannersController@deleteAll',
                'as'        => 'delete_banners',
                'title'     => 'حذف اكتر من بانر اعلاني'
            ]);
        // ============= #banners ==============

        // ============= categories ==============
            Route::get('/categories',[
                'uses'      =>'CategoriesController@index',
                'as'        =>'categories_index',
                'icon'      =>'<i class="fa  fa-th-large" aria-hidden="true"></i>',
                'title'     => 'الأقسام',
                'type'      =>'parent',
                'child' => [
                    'categories_store',
                    'categories_update',
                    'categories_destroy',
                    'delete_categories',
                ]
            ]);
            // Add categories
            Route::post('/categories', [
                'uses'      => 'CategoriesController@store',
                'as'        => 'categories_store',
                'title'     => 'اضافة  قسم'
            ]);
            // Update categories
            Route::put('/categories/{id}', [
                'uses'      => 'CategoriesController@update',
                'as'        => 'categories_update',
                'title'     => 'تعديل  قسم'
            ]);
            // Delete categories
            Route::delete('/categories/{id}', [
                'uses'      => 'CategoriesController@destroy',
                'as'        => 'categories_destroy',
                'title'     => 'حذف قسم '
            ]);
            // Delete all categories
            Route::post('/categories/deleteAll', [
                'uses'      => 'CategoriesController@deleteAll',
                'as'        => 'delete_categories',
                'title'     => 'حذف اكتر من قسم '
            ]);
        // ============= #categories ==============

        // ============= subcategories ==============
            Route::get('/subcategories',[
                'uses'      =>'SubCategoriesController@index',
                'as'        =>'subcategories_index',
                'icon'      =>'<i class="fa  fa-th-large" aria-hidden="true"></i>',
                'title'     => 'الأقسام الفرعيه ',
                'type'      =>'parent',
                'child' => [
                    'subcategories_store',
                    'subcategories_update',
                    'subcategories_destroy',
                    'delete_subcategories',
                ]
            ]);
            // Add subcategories
            Route::post('/subcategories', [
                'uses'      => 'SubCategoriesController@store',
                'as'        => 'subcategories_store',
                'title'     => 'اضافة  قسم فرعي'
            ]);
            // Update subcategories
            Route::put('/subcategories/{id}', [
                'uses'      => 'SubCategoriesController@update',
                'as'        => 'subcategories_update',
                'title'     => 'تعديل  قسم فرعي'
            ]);
            // Delete subcategories
            Route::delete('/subcategories/{id}', [
                'uses'      => 'SubCategoriesController@destroy',
                'as'        => 'subcategories_destroy',
                'title'     => 'حذف قسم فرعي '
            ]);
            // Delete all subcategories
            Route::post('/subcategories/deleteAll', [
                'uses'      => 'SubCategoriesController@deleteAll',
                'as'        => 'delete_subcategories',
                'title'     => 'حذف اكتر من قسم فرعي '
            ]);
        // ============= #subcategories ==============

        // ============= المستخدمين ==============
            Route::get('all-users2',[
                'uses'      =>'UsersController@index',
                'as'        =>'users2',
                'title'     =>'الاعضاء ',
                'icon'      =>'<i class="fa fa-users" aria-hidden="true"></i>',
                'type'      =>'parent',
                'sub_route' =>true,
                'child'     => [
                    'admins_index',
                    'admins_store',
                    'admins_update',
                    'admins_destroy',
                    'delete_admins',
                    'users_index',
                    'users_store',
                    'users_update',
                    'users_destroy',
                    'delete_users',
                    'providers_index',
                    'providers_store',
                    'providers_update',
                    'providers_destroy',
                    'delete_providers',
                    'emailallusers',
                    'smsallusers',
                    'notificationallusers',
                    'emailSingleUser',
                    'notificationSingleUser',
                    'smsSingleUser'

                ]
            ]);


            // ============= Contacting users ==============
                #email for all users
                Route::post('email-users',[
                    'uses' =>'UsersController@EmailMessageAll',
                    'as'   =>'emailallusers',
                    'title'=>'ارسال email للجميع'
                ]);

                #sms for all users
                Route::post('sms-users',[
                    'uses' =>'UsersController@SmsMessageAll',
                    'as'   =>'smsallusers',
                    'title'=>'ارسال sms للجميع'
                ]);

                #notification for all users
                Route::post('notification-users',[
                    'uses' =>'UsersController@NotificationMessageAll',
                    'as'   =>'notificationallusers',
                    'title'=>'ارسال notification للجميع'
                ]);

                #email for single user
                Route::post('email-single-user',[
                    'uses' =>'UsersController@EmailSingleUser',
                    'as'   =>'emailSingleUser',
                    'title'=>'ارسال email لعضو'
                ]);

                #notification for single user
                Route::post('notification-single-user',[
                    'uses' =>'UsersController@NotificationSingleUser',
                    'as'   =>'notificationSingleUser',
                    'title'=>'ارسال notification لعضو'
                ]);


                #sms for single user
                Route::post('sms-single-user',[
                    'uses' =>'UsersController@SmsSingleUser',
                    'as'   =>'smsSingleUser',
                    'title'=>'ارسال sms لعضو'
                ]);
            // ============= #Contacting users ==============
            // ============= admins ==============
                Route::get('admins',[
                    'uses'      =>'AdminsController@index',
                    'as'        =>'admins_index',
                    'icon'      =>'<i class="fa fa-user" aria-hidden="true"></i>',
                    'title'     => 'المشرفين',
                ]);
                // Add admin
                Route::post('admins', [
                    'uses'      => 'AdminsController@store',
                    'as'        => 'admins_store',
                    'title'     => 'اضافة مشرف'
                ]);
                // Update admin
                Route::put('admins/{id}', [
                    'uses'      => 'AdminsController@update',
                    'as'        => 'admins_update',
                    'title'     => 'تعديل مشرف'
                ]);
                // Delete admin
                Route::delete('admins/{id}', [
                    'uses'      => 'AdminsController@destroy',
                    'as'        => 'admins_destroy',
                    'title'     => 'حذف مشرف'
                ]);
                // Delete all admin
                Route::post('admins/deleteAll', [
                    'uses'      => 'AdminsController@deleteAll',
                    'as'        => 'delete_admins',
                    'title'     => 'حذف اكتر من مشرف'
                ]);
            // ============= #admins ==============

            // ============= users ==============
                Route::get('/users',[
                    'uses'      =>'UsersController@index',
                    'as'        =>'users_index',
                    'icon'      =>'<i class="fa fa-user" aria-hidden="true"></i>',
                    'title'     => 'المستخدمين',
                ]);
                // Add User
                Route::post('/users', [
                    'uses'      => 'UsersController@store',
                    'as'        => 'users_store',
                    'title'     => 'اضافة عضو'
                ]);
                // Update User
                Route::put('/users/{id}', [
                    'uses'      => 'UsersController@update',
                    'as'        => 'users_update',
                    'title'     => 'تعديل عضو'
                ]);
                // Delete User
                Route::delete('/users/{id}', [
                    'uses'      => 'UsersController@destroy',
                    'as'        => 'users_destroy',
                    'title'     => 'حذف عضو'
                ]);
                // Delete all Users
                Route::post('/users/deleteAll', [
                    'uses'      => 'UsersController@deleteAll',
                    'as'        => 'delete_users',
                    'title'     => 'حذف اكتر من عضو'
                ]);
            // ============= #users ==============
            // ============= providers ==============
                Route::get('/providers',[
                    'uses'      =>'ProviderController@index',
                    'as'        =>'providers_index',
                    'icon'      =>'<i class="fa fa-user" aria-hidden="true"></i>',
                    'title'     => 'مقدمين الخدمات',
                ]);
                // Add providers
                Route::post('/providers', [
                    'uses'      => 'ProviderController@store',
                    'as'        => 'providers_store',
                    'title'     => 'اضافة مقدم خدمه'
                ]);
                // Update providers
                Route::put('/providers/{id}', [
                    'uses'      => 'ProviderController@update',
                    'as'        => 'providers_update',
                    'title'     => 'تعديل مقدم خدمه'
                ]);
                // Delete providers
                Route::delete('/providers/{id}', [
                    'uses'      => 'ProviderController@destroy',
                    'as'        => 'providers_destroy',
                    'title'     => 'حذف مقدم خدمه'
                ]);
                // Delete all providers
                Route::post('/providers/deleteAll', [
                    'uses'      => 'ProviderController@deleteAll',
                    'as'        => 'delete_providers',
                    'title'     => 'حذف اكتر من مقدم خدمه'
                ]);
            // ============= #users ==============
        

        // ============= #المستخدمين ==============

        // ============= services ==============
            Route::get('/services',[
                'uses'      =>'ServicesController@index',
                'as'        =>'services_index',
                'icon'      =>'<i class="fa  fa-th-large" aria-hidden="true"></i>',
                'title'     => 'الخدمات',
                'type'      =>'parent',
                'child' => [
                    'services_store',
                    'services_update',
                    'services_destroy',
                    'delete_services',
                    'activeServices',
                ]
            ]);
            // Add services
            Route::post('/services', [
                'uses'      => 'ServicesController@store',
                'as'        => 'services_store',
                'title'     => 'اضافة خدمه'
            ]);
            // Update services
            Route::put('/services/{id}', [
                'uses'      => 'ServicesController@update',
                'as'        => 'services_update',
                'title'     => 'تعديل  خدمه '
            ]);
            // Delete services
            Route::delete('/services/{id}', [
                'uses'      => 'ServicesController@destroy',
                'as'        => 'services_destroy',
                'title'     => 'حذف خدمه  '
            ]);
            // Delete all services
            Route::post('/services/deleteAll', [
                'uses'      => 'ServicesController@deleteAll',
                'as'        => 'delete_services',
                'title'     => 'حذف اكتر من خدمه  '
            ]);
             // bin ads
            Route::post('/services/activeServices', [
                'uses'      => 'ServicesController@activeServices',
                'as'        => 'activeServices',
                'title'     => 'تفعيل والغاء تفعيل خدمه'
            ]);
        // ============= #services ==============

        // ============= Contact us ==============
             Route::get('contact_us', [
                 'uses'  => 'ContactUsController@index',
                 'as'    => 'contact_us',
                 'title' => 'الشكاوي والمقترحات',
                 'icon'  => '<i class="fa fa-comments" aria-hidden="true"></i>',
                 'type'  =>'parent',
                 'child' => [
                     'mail_info',
                     'send_mail',
                     'delete_mail',
                     'get_mail',
                 ]
             ]);

             Route::post('/send_mail', [
                 'uses'  => 'ContactUsController@sendMail',
                 'as'    => 'send_mail',
                 'title' => 'ارسال رسالة'
             ]);
             Route::post('/delete_mail', [
                 'uses'  => 'ContactUsController@deleteMail',
                 'as'    => 'delete_mail',
                 'title' => 'حذف رسالة'
             ]);

             Route::get('/get_mail', [
                 'uses'  => 'ContactUsController@getMail',
                 'as'    => 'get_mail',
                 'title' => 'الرسائل المقرؤة والغير مقرؤة'
             ]);

             Route::get('/mail_info', [
                 'uses'  => 'ContactUsController@mailInfo',
                 'as'    => 'mail_info',
                 'title' => 'عرض الرسالة'
             ]);
        // ============= #Contact Us ==============
        
        // ============= Settings ==============
            Route::get('settings', [
                'uses'  => 'SettingController@index',
                'as'    => 'settings',
                'title' => 'الاعدادات',
                'icon'  => '<i class="fa fa-sliders" aria-hidden="true"></i>',
                'type'  =>'parent',
                'child' => [
                    'sitesetting',
                    'add-social',
                    'update-social',
                    'delete-social',
                    'update-phone',
                    'add-phones',
                    'delete-phone',
                ]
            ]);

            // Social Sites
            Route::post('/add-social', [
                'uses'  => 'SettingController@storeSocial',
                'as'    => 'add-social',
                'title' => 'اضافة مواقع التواصل'
            ]);

            Route::post('/update-social', [
                'uses'  => 'SettingController@updateSocial',
                'as'    => 'update-social',
                'title' => 'تعديل مواقع التواصل'
            ]);

            Route::post('/update-phone', [
                'uses'  => 'SettingController@updatePhone',
                'as'    => 'update-phone',
                'title' => 'تعديل  رقم الهاتف'
            ]);



            Route::post('/update-settings', [
                'uses'  => 'SettingController@updateSiteInfo',
                'as'    => 'sitesetting',
                'title' => 'تعديل بيانات الموقع'
            ]);



            Route::get('/delete-social/{id}', [
                'uses'  => 'SettingController@deleteSocial',
                'as'    => 'delete-social',
                'title' => 'حذف مواقع التواصل'
            ]);



            Route::post('/add-phones', [
                'uses'  => 'SettingController@storePhones',
                'as'    => 'add-phones',
                'title' => 'اضافة رقم  هاتف'
            ]);

            Route::get('/delete-phone/{id}', [
                'uses'  => 'SettingController@deletePhone',
                'as'    => 'delete-phone',
                'title' => 'حذف رقم الهاتف  '
            ]);
        // ============= #Settings ==============

        // ============= Permission ==============
            Route::get('permissions-list', [
                'uses'      => 'PermissionController@index',
                'as'        => 'permissions_list',
                'title'     => 'قائمة الصلاحيات',
                'icon'      => '<i class="fa fa-list-ul" aria-hidden="true"></i>',
                'type'      =>'parent',
                'child'     => [

                        'add_permission',
                        'store_permission',
                        'edit_permission',
                        'update_permission',
                        'delete_permission',
                ]
            ]);

            Route::get('add-permission', [
                'uses' => 'PermissionController@create',
                'as' => 'add_permission',
                'title' => 'اضافة صلاحيه',
            ]);

            Route::post('store-permission', [
                'uses' => 'PermissionController@store',
                'as' => 'store_permission',
                'title' => 'تمكين اضافة صلاحيه'
            ]);

            #edit permissions page
            Route::get('edit-permissions/{id}', [
                'uses' => 'PermissionController@edit',
                'as' => 'edit_permission',
                'title' => 'تعديل صلاحيه'
            ]);

            #update permission
            Route::post('update-permission', [
                'uses' => 'PermissionController@update',
                'as' => 'update_permission',
                'title' => 'تمكين تعديل صلاحيه'
            ]);

            #delete permission
            Route::post('delete-permission', [
                'uses' => 'PermissionController@destroy',
                'as' => 'delete_permission',
                'title' => 'حذف صلاحيه'
            ]);
        // ============= #Permission ==============
      
        // ============= Reports ==============
            Route::get('all-reports', [
                'uses'  => 'ReportController@index',
                'as'    => 'allreports',
                'title' => 'التقارير',
                'icon'  => '<i class="fa fa-list-alt" aria-hidden="true"></i>',
                'type'  =>'parent',
                'child' => [
                    'deletereports',
                ]
            ]);

            Route::get('/delete-reports', [
                'uses'  => 'ReportController@delete',
                'as'    => 'deletereports',
                'title' => 'حذف التقارير'
            ]);
        // ============= #Reports ==============

        // // ============= charts ==============
        //     Route::get('charts', [
        //         'uses'  => 'ChartsController@index',
        //         'as'    => 'charts',
        //         'title' => 'الاحصائيات',
        //         'icon'  => '<i class="fa fa-comments" aria-hidden="true"></i>',
        //         'type'  =>'parent',
        //     ]);
        // // ============= #charts ==============

        // ============= Chat support ==============
            // Route::get('chat_support', [
            //     'uses'  => 'ChatSupportsController@index',
            //     'as'    => 'chat_support',
            //     'title' => 'الدعم الفني',
            //     'icon'  => '<i class="fa fa-user-secret" aria-hidden="true"></i>',
            //     'type'  =>'parent',
            //     'child' => [
            //         'send_message',
            //         'get_chat',
            //     ]
            // ]);

            // Route::post('/send_message', [
            //     'uses'  => 'ChatSupportsController@sendMessage',
            //     'as'    => 'send_message',
            //     'title' => 'ارسال رسالة'
            // ]);

            // Route::get('/get_chat', [
            //     'uses'  => 'ChatSupportsController@getChat',
            //     'as'    => 'get_chat',
            //     'title' => 'رسائل الشات'
            // ]);
        // ============= Chat support ==============
    });
    // Guest routs
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/lang/{lang}'             , 'AuthController@SetLanguage');
        Route::get('/login'                   , 'AuthController@loginForm')->name('loginForm');
        Route::post('/login'                  , 'AuthController@login')->name('login');
    });
    
        Route::any('/getAdditions'            , 'ServicesController@getAdditions')->name('getAdditions');
        Route::any('/updateAddition/{id}'     , 'ServicesController@updateAddition')->name('updateAddition');
        Route::any('/addAdditions'            , 'ServicesController@addAdditions')->name('addAdditions');
        Route::any('/deleteAdditions'         , 'ServicesController@deleteAdditions')->name('deleteAdditions');

        Route::any('/getImages'               , 'ServicesController@getImages')->name('getImages');
        Route::any('/deleteImages'            , 'ServicesController@deleteImages')->name('deleteImages');
        Route::any('/logout'                  , 'AuthController@logout')->name('logout');



