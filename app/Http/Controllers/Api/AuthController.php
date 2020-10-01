<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use App\Models\User;
use App\Models\UserToken;
use App\Models\UserUpdate;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\ActivataAccount;
use App\Http\Requests\Api\RegisterRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\Api\ResetPasswordRequets;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Requests\Api\ForgetPasswordRequest;

class AuthController extends BaseController
{

     public function login(LoginRequest $request)
    {
        if (! $token = JWTAuth::attempt(['phone' => convert2english($request->phone), 'password' => $request->password , 'type' => $request->type])) {
           $user = JWTAuth::attempt(['phone' => convert2english($request->phone), 'password' => $request->password]);
           if ($user) {
               $type = $request->type == 'user' ? trans('apis.user') : trans('apis.provider') ;
               return $this->sendError('',trans('apis.wrongType') .' '.$type);
           }
            return $this->sendError('',trans('apis.password'));
        }

        $user = auth()->user();
        if($user->active == 0)
        {
            $user->code = rand(1111, 9999) ;
            $user->save();
            send_mobile_sms($request->phone,'كود التفعيل :'.$user->code) ;
            return $this->sendError(['code' => $user->code ,'user_id' => $user->id],trans('apis.un_active_account'));
        }

        $user->token = $token ;
        $user->save();
        UserToken ::updateOrCreate([
            'user_id'    => $user->id ,
            'device_id'  => $request->device_id ,
        ]);
        return $this->sendResponse(new UserResource($user),trans('apis.login'));
    }

    public function register(RegisterRequest $request)
    {
        $data               = $request->except(['device_id']);
        $data['active']     = 0;
        $data['type']       = 'user';
        $data['code']       = rand(1111, 9999);
        $data['avatar']     = $request->avatar ? UploadFile::uploadBase64($request->avatar , 'users') : 'default.png';
        $user               = User::create($data);
        if ($user){
            if ($request->device_id)
                UserToken::create(['user_id' => $user->id , 'device_id' => $request->device_id]);

            send_mobile_sms($request->phone,'كود التفعيل :'.$user->restore_code) ;
            return $this->sendResponse(['user_id' => $user->id ,'code' => $user->code],__('apis.register'));
        }
    }
    
    public function activeAccount(ActivataAccount $request)
    {
        $user = User::find($request->user_id);
        if ($user){
            $user->update(['active' => 1 , 'code' => null ]);
            return $this->sendResponse('', trans('apis.active_account'));
        }else{
            return $this->sendError('',trans('apis.user_not_found'));
        }
    }

     public function ForgetPassword(ForgetPasswordRequest $request)
    {
        $user = User::where('phone', convert2english($request->phone))->first();
        $code = rand(1111, 9999);
        UserUpdate::updateOrCreate(
            [
            'type'    => 'password' ,
            'user_id' => $user->id 
            ],[
            'phone'   => $user->phone ,
            'code'    => $code 
            ]
        );
        send_mobile_sms($request->phone,'كود التفعيل :'.$code) ;
        $data['id']  = $user->id;
        $data['code'] = $code;
        return $this->sendResponse($data,trans('apis.validation_code'));
    }

    public function ResetPassword(ResetPasswordRequets $request)
    {    
        $user           = User::find($request->id);
        $user->password = $request['password'];
        $user->save();
        UserUpdate::where(['user_id' => $user->id ,'type' => 'password'])->first()->delete();
        return $this->sendResponse('',trans('apis.update_password'));
    }

    public function UpdateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name'    => $request->name ,
            'phone'   => convert2english($request->phone) ,
            'whatsapp'=> $request->whatsapp ?  convert2english($request->whatsapp)  : $user->whatsapp,
            'avatar'  => $request->avatar ?  UploadFile::uploadBase64($request->avatar , 'users') : $user->avatar ,
        ]);
        return $this->sendResponse(new UserResource($user), __('apis.update_account'));
    }

    public function Logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            JWTAuth::invalidate($token);
            return $this->sendResponse('',trans('apis.loggedOut'));
        } catch (JWTException $e) {
            return $this->sendError('',__('apis.something_wrong'));
        }
    }

    public function UserData(Request $request){
        $user           = auth()->user();
        $token          = $request->header('Authorization');
        $userData       = [
            'id'            => $user->id,
            'avatar'        => asset('/images/users/'. $user->avatar) ,
            'name'          => $user->name,
            'phone'         => $user->phone,
            'email'         => $user->email,
            'national_id'   => $user->national_id,
            'code'          => $user->code,
            'active'        => $user->active,
            'device_id'     => $user->device_id,
            'isNotify'      => $user->isNotify,
            'created_at'    => $user->created_at,
            'updated_at'    => $user->updated_at,
            'token'         => $token,
        ];
        return $this->sendResponse($userData,'');
    }

    
}