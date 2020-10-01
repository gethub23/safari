<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use App\Helpers\UploadFile;
use App\Http\Requests\Admin\Banners\Store;
use App\Http\Controllers\Admin\AdminBasicControllerUrl;


class BannersController extends AdminBasicControllerUrl
{
    public function __construct(Banner $model){
        $this->model = $model;
        view()->share([
            'singleName'        => 'بنر اعلاني'      ,
            'pluralName'        => 'بنرات اعلانيه'   ,
            'withRoutes'        => true              ,
            'addRoute'          => 'banners_store'   ,
            'updateRoute'       => 'banners_update'  ,
            'deleteRoute'       => 'banners_destroy' ,
            'deleteAllRoute'    => 'delete_banners'  ,
        ]);
    } 

    public function store(Store $request)
    {
        $requests       = $request->all();
        $requests['image']  =  UploadFile::uploadImage($request->file('image'), 'banners');
        $this->model->create($requests);
        return Response()->json();
    }

    public function update($id,Store $request)
    {
        $banner =  $this->model->find($id);
        $banner->image           = $request->hasFile('image') ?  UploadFile::uploadImageOnUpdate($banner->image,$request->file('image'), 'banners')   : $banner->image;
        $banner->url             = $request->url;
        $banner->expire_date     = $request->expire_date ? $request->expire_date : $banner->expire_date;
        $banner->title_ar        = $request->title_ar;
        $banner->title_en        = $request->title_en;
        $banner->description_ar  = $request->description_ar;
        $banner->description_en  = $request->description_en;
        $banner->save();
        return Response()->json();
    }
}
