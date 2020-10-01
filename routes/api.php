<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'localization','namespace' => 'Api'], function (){

    //-------------------------------------- auth routes ------------------------------------\\
        Route::post('register'                  , 'AuthController@register'                 );
        Route::post('activeAccount'             , 'AuthController@activeAccount'            );
        Route::post('login'                     , 'AuthController@login'                    );
        Route::post('ForgetPassword'            , 'AuthController@ForgetPassword'           );
        Route::post('ResetPassword'             , 'AuthController@ResetPassword'            );
        Route::post('intros'                    , 'SettingController@intros'                );
        //-------------------------------------- auth routes ------------------------------------\\
        
        Route::group(['middleware' => ['jwt']], function (){
            //-------------------------------------- settings routes ----------------------------------------------------\\
            Route::post('categories'               , 'SettingController@categories'                    );
            Route::post('subCategories'            , 'SettingController@subCategories'                 );
            Route::post('subCategoriesByCategory'  , 'SettingController@subCategoriesByCategory'       );
            Route::post('banners'                  , 'SettingController@banners'                       );
            Route::post('about'                    , 'SettingController@about'                         );
            Route::post('terms'                    , 'SettingController@terms'                         );
            Route::post('contactUs'                , 'SettingController@contactUs'                     );
            //-------------------------------------- settings routes ----------------------------------------------------\\
            
            //-------------------------------------- services routes ----------------------------------------------------\\
            Route::post('ProvidersBySubCategory'   , 'ServicesController@ProvidersBySubCategory'       );
            Route::post('providerServices'         , 'ServicesController@providerServices'             );
            Route::post('serviceDetailes'          , 'ServicesController@serviceDetailes'              );
            Route::post('favAndUnFav'              , 'ServicesController@favAndUnFav'                  );
            Route::post('search'                   , 'ServicesController@search'                       );
            Route::post('myServices'               , 'ServicesController@myServices'                   );
            Route::post('storeService'             , 'ServicesController@storeService'                 );
            //-------------------------------------- services routes ----------------------------------------------------\\

            //-------------------------------------- user routes     ----------------------------------------------------\\
            Route::post('UpdateProfile'             , 'AuthController@UpdateProfile'                   );
            Route::post('favorites'                 , 'UserController@favorites'                       );
            Route::post('ChangePassword'            , 'UserController@ChangePassword'                  );
            Route::post('changeNotifyStatu'         , 'UserController@changeNotifyStatu'               );
            Route::post('sendComplaint'             , 'UserController@sendComplaint'                   );
            Route::post('rateService'               , 'UserController@rateService'                     );
            Route::post('notifications'             , 'UserController@notifications'                   );
            //-------------------------------------- user routes     ----------------------------------------------------\\
    });
});