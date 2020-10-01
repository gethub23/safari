<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

class BasicSiteController extends Controller
{

    public function home(){
        return redirect('/admin');
    }
    public function fcm(){
        return view('fcm');
    }

}
