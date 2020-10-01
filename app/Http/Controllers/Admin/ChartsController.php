<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartsController extends Controller
{
    public function index(){
        view()->share([
           'pluralName'   => 'الاحصائيات'
        ]);
        return view('dashboard.charts.index');
    }
}
