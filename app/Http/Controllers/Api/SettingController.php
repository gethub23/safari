<?php

namespace App\Http\Controllers\Api;

use DB ;
use App\Models\User;
use App\Models\Intro;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\AppSetting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Api\Complaint\Store;
use App\Http\Controllers\Api\BaseController;

class SettingController extends BaseController
{ 
    public function categories(){
        $categories = Category::get()->map(function($category){
            return[
                'id'     => $category->id,
                'name'   => $category->name,
            ];
        });
        return $this->sendResponse($categories, '');
    }

    public function subCategories(){
        $categories = SubCategory::get()->map(function($category){
            return[
                'id'     => $category->id,
                'name'   => $category->name,
            ];
        });
        return $this->sendResponse($categories, '');
    }

    public function subCategoriesByCategory(Request $request){
        $categories = SubCategory::where('category_id' , $request->category_id)->get()->map(function($category){
            return[
                'id'     => $category->id,
                'name'   => $category->name,
            ];
        });
        return $this->sendResponse($categories, '');
    }

    public function banners(){
        $banners = Banner::where('active',1)->get()->map(function($banner){
            return [
                'title'        => $banner->title ,
                'description'  => $banner->description ,
                'image'        => url('public/images/banners/'.$banner->image)  ,
            ];
        });
         return $this->sendResponse($banners, '');
    }
    
    public function intros(){
        $intros = Intro::get()->map(function($intro){
            return [
                'title'        => $intro->title ,
                'description'  => $intro->description ,
                'image'        => url('public/images/intros/'.$intro->image)  ,
            ];
        });
         return $this->sendResponse($intros, '');
    }


    public function about()
    {
        $about_lang = 'about_'.lang();
        $data['about'] = AppSetting::where('key', $about_lang)->first()->value;
        return $this->sendResponse($data, '');
    }

    public function terms()
    {
        $about_lang = 'terms_'.lang();
        $data['terms'] = AppSetting::where('key', $about_lang)->first()->value;
        return $this->sendResponse($data, '');
    }

    
    public function contactUs()
    {
        $socials =  DB::table('socials')->get();
        $socialArr = [];
        foreach ($socials as $key => $social)
        {
            $socialArr[$key] = [
                                'icon'       => asset('/images/socials/' . $social->icon),
                                'site_name'  => $social->site_name,
                                'url'        => $social->url,
            ];

        }
        $data = [
                'phone'      => AppSetting::where('key', 'phone')->first()->value ,
                'email'      => AppSetting::where('key', 'email')->first()->value ,
                'whatsapp'   => AppSetting::where('key', 'whatsapp')->first()->value ,
                'socials'    => $socialArr ,
        ];

        return $this->sendResponse($data, '');
    }
  
}