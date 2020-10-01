<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\User;
use App\Models\Service;
use App\Models\Addition;
use App\Models\Category;
use App\Helpers\UploadFile;
use App\Models\SubCategory;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Services\Store;

class ServicesController extends AdminBasicControllerUrl
{
    public function __construct(Service $model){
        $this->model = $model;
        view()->share([
            'singleName'    => 'خدمه',
            'pluralName'    => 'الخدمات',
            'users'         => User::where('type','provider')->get(),
            'categories'    => Category::get(),
            'subCategories' => SubCategory::get(),
        ]);
    }

    public function store(Store $request)
    {
        $service =  $this->model->create($request->all());
        if($request->images)
        {
            $images = [];
            foreach ($request->images as $image)
            {
                $images[]['image'] = UploadFile::uploadImage($image, 'services');
            }
            $service->images()->createMany($images);
        }
        if($request->addition_images)
        {
            $additions_images = [];
            foreach ($request->addition_images as $image)
            {
                $additions_images[] = UploadFile::uploadImage($image, 'services');
            }
            for ($i=0; $i < count($additions_images) ; $i++) { 
                Addition::create([
                    'image'        => $additions_images[$i] ,
                    'addition_ar'  => $request->addition_ar[$i] ,
                    'addition_en'  => $request->addition_en[$i] ,
                    'service_id'   => $service->id ,
                ]);
            }
        }
        return Response()->json();
    }

    public function update($id,Store $request)
    {
        $service = $this->model->findOrFail($id);
        $service->update($request->all());
         if($request->images)
        {
            $images = [];
            foreach ($request->images as $image)
            {
                $images[]['image'] = UploadFile::uploadImage($image, 'services');
            }
            $service->images()->createMany($images);
        }
        return Response()->json();
    }

    public function getAdditions(Request $request){
        $additions = $this->model->find($request->id)->additions;
        $type   = $request->type ; 
        $additions =  view('dashboard.services.additions',compact('additions','type'))->render();
        return Response()->json(['additions' => $additions]);
    }

    public function updateAddition(Request $request ,$id){
        $addition = Addition::find($id);
        $addition->update([
            'addition_ar'  => $request->addition_ar ,
            'addition_en'  => $request->addition_en ,
            'image'        => $request->image ?  UploadFile::uploadImage($request->image, 'services') : $addition->image ,
        ]);
        return back()->with('success','تم التحديث بنجاح');
    }

    public function deleteAdditions(Request $request){
        $addition = Addition::find($request->id)->delete();
        return Response()->json();
    }

    public function addAdditions(Request $request){
         if($request->addition_images)
        {
            $additions_images = [];
            foreach ($request->addition_images as $image)
            {
                $additions_images[] = UploadFile::uploadImage($image, 'services');
            }
            for ($i=0; $i < count($additions_images) ; $i++) { 
                Addition::create([
                    'image'        => $additions_images[$i] ,
                    'addition_ar'  => $request->addition_ar[$i] ,
                    'addition_en'  => $request->addition_en[$i] ,
                    'service_id'   => $request->service_id ,
                ]);
            }
        }
        return back()->with('success','تم الاضافه بنجاح');
    }

    public function getImages(Request $request){
        $images = $this->model->find($request->id)->images;
        $type   = $request->type ; 
        $images =  view('dashboard.services.images',compact('images','type'))->render();
        return Response()->json(['images' => $images]);
    }

    public function deleteImages(Request $request){
         
        $image = ServiceImage::findOrFail($request->id);
        if($image->service->images->count() == 1){
            return Response()->json(['done' => 0]);
        }
        File::delete(public_path('images/services/' . $image->image));
        $image->delete();
        return Response()->json(['done' => 1]);
    }


    public function activeServices(Request $request)
    {
        $ad =  $this->model->find($request->id);
        $ad->accepted = $ad->accepted == 0 ? 1 : 0 ;
        $ad->save();
        return response()->json(['status' => $ad->accepted]);
    }

}
