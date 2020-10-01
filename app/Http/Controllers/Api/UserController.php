<?php

namespace App\Http\Controllers\Api;

use Hash;

use JWTAuth;
use App\Models\Rate;
use App\Models\Service;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\Api\RateServiceRequest;
use App\Http\Requests\Api\SendComplaintRequest;
use App\Http\Requests\Api\ChangePasswordController;

class UserController extends BaseController
{
    public function favorites(){
        $ids = auth()->user()->favorites->pluck('service_id')->toArray() ;
        $services = Service::whereIn('id' , $ids)->get()->map(function($service){
            return [
                'id'     => $service->id   ,
                'name'   => $service->name ,
                'price'  => $service->price ,
                'isFav'  => $service->isFav() ,
                'image'  => url('public/images/services/',$service->images->first()->image),
            ];
        });
        return $this->sendResponse($services, '');
    }

    public function ChangePassword(ChangePasswordController $request)
    {
       
        if (!\Hash::check($request->old_password, JWTAuth::user()->password)) 
            return $this->sendError('',__('apis.old_pass_wrong'));
        

        $user= auth()->user()->update(['password' => $request->new_password]);
        return $this->sendResponse('',trans('apis.update_password'));
    }


    public function changeNotifyStatu()
    {
        $user = auth()->user();
        $user->isNotify = $user->isNotify == 1 ? 0 : 1 ;
        $user->save();
        $msg = $user->isNotify == 1 ? trans('apis.openNotify') : trans('apis.closeNotify') ;
        return $this->sendResponse('',$msg);
    }

     public function sendComplaint(SendComplaintRequest $request)
    {
        ContactUs::create([
            'email'   => $request->email ,
            'subject' => $request->subject ,
            'message' => $request->message ,
            'user_id' => auth() -> id(),
        ]);
        return $this->sendResponse('', __('apis.complaint_send'));
    }

     public function rateService(RateServiceRequest $request)
    {
        Rate::updateOrCreate([
                'user_id'   => auth()->id() ,
                'service_id' => $request->service_id 
            ],[
                'rate' => $request->rate ,
            ]);
        return $this->sendResponse('', __('apis.rated'));
    }


    public function notifications()
    {
        $notifications = auth()->user()->notifications ;
        return $this->sendResponse($notifications, '');
    }
}
