<?php

use Illuminate\Support\Facades\Route;

        Route::get('/home', 'BasicSiteController@home');
        Route::get('/'    , 'BasicSiteController@home');
//        Route::get('/fcm'    , function (){
//            send_mobile_sms('0555105813','wwwwwwww');
//        });
