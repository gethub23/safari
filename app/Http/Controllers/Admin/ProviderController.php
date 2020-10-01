<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Helpers\UploadFile;
use App\Http\Requests\Admin\Providers\Store;

class ProviderController extends AdminBasicControllerRoute
{
    public function __construct(User $model){
        $this->model = $model;
        view()->share([
            'rows'              => User::where('type','provider')->get()     ,
            'singleName'        => 'مقدم خدمه'      ,
            'pluralName'        => 'مقدمين الخدمات'   ,
            'withRoutes'        => true              ,
            'addRoute'          => 'providers_store'   ,
            'updateRoute'       => 'providers_update'  ,
            'deleteRoute'       => 'providers_destroy' ,
            'deleteAllRoute'    => 'delete_providers'  ,
        ]);
    } 

    public function index()
    {  
      return  view('dashboard.providers.index');
    }

    public function store(Store $request)
    {
        $requests             = $request->all();
        $requests['avatar']   = $request->hasFile('avatar') ? UploadFile::uploadImage($request->file('avatar'), 'users') : 'default.png';
        $requests['type']     = 'provider' ;
        $this->model->create($requests);
        return Response()->json();
    }

}
