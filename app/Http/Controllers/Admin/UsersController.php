<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Category;
use App\Helpers\UploadFile;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Users\Store;
use App\Http\Requests\Admin\Users\Update;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailMessageAll;
use DB;

class UsersController extends AdminBasicControllerUrl
{
    public function __construct(User $model){
        $this->model = $model;
        view()->share([
            'singleName'    => 'مستخدم',
            'pluralName'    => 'مستخدمين',
            'categories'    => Category::get(),
            'users'         => $this->model->user()->latest()->get(),
        ]);
    } 

    public function store(Store $request)
    {
        $data = $request->all() ;
        $data['avatar'] =  $request->hasFile('avatar') ?  UploadFile::uploadImage($request->file('avatar'), 'users') :'default.png';
        $data['type']   =  'user';
        $data['active'] =  1 ;
        $this->model->create($data);
        return Response()->json();
    }

    public function update($id,Update $request)
    {
        $user = $this->model->findOrFail($request->id);
        $data = $request->all();
        $data['avatar'] =   $request->has('avatar') ?  UploadFile::uploadImageOnUpdate($user->avatar,$request->file('avatar'), 'users') : $user->avatar;
        $user->update($data);
        return Response()->json();
    }

    public function EmailMessageAll(Request $request){
        $this->validate($request, [ 'message' => 'required|min:5']);
        User::user()->where('email','!=',null)->pluck('email')->map(function ($email) use ($request){
            Mail::to($email)->send(new EmailMessageAll($request->message));
        });
        return back()->with('success', awtTrans('تم ارسال الايميل بنجاح'));
    }

    public function NotificationMessageAll(Request $request)
    {
        $this->validate($request, [ 'message' => 'required|min:5']);
        User::user()->get()->map(function ($user){
            set_notification( 0 ,auth()->id() , $user->id);
        });
        return back()->with('success', awtTrans('تم ارسال الاشعار بنجاح'));
    }

    public function SmsMessageAll(Request $request){
        $this->validate($request, [ 'message' => 'required|min:5']);
        User::user()->where('phone','!=',null)->pluck('phone')->map(function ($phone) use ($request){
            send_mobile_sms($phone,$request->sms_message);
        });
        return back()->with('success', awtTrans('تم ارسال الرساله بنجاح'));
    }

    public function NotificationSingleUser(Request $request){
        $this->validate($request, [
            'sms_message' => 'required|min:5'
        ]);
        $notification = new Notification();
        $notification->body_ar = $request->sms_message;
        $notification->type = 1;
        $notification->sender_id = Auth()->user()->id;
        $notification->reciver_id = $request->id;
        $notification->save();
        return back()->with('success', 'تم الارسال');
    }

    public function SmsSingleUser(){
        dd('sms single user');
    }

    public function EmailSingleUser(Request $request){
        $this->validate($request, ['email_message' => 'required|min:5']);
        Mail::to($request->email)->send(new EmailMessageAll($request->email_message));
        return back()->with('success', 'تم الارسال');
    }

}
