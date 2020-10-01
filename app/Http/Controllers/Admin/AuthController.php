<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserToken;
use App\Models\Role;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function SetLanguage($lang)
    {
        if ( in_array( $lang, [ 'ar', 'en' ] ) ) {

            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );
                session() -> put( 'lang', $lang );
        } else {
            if ( session() -> has( 'lang' ) )
                session() -> forget( 'lang' );

            session() -> put( 'lang', 'ar' );
        }
        return back();
    }
    // Dashboard Page
    public function dashboard()
    {
        return view('dashboard.dashboard.index');
    }

    public function loginForm()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $web_token = '';

        if(isset($_COOKIE['web_token'])) {
            $web_token = $_COOKIE['web_token'];
        }

        $rememberme = $request->rememberme == 1 ? true : false;
        if (auth()->guard()->attempt(['email' => $request->email, 'password' => $request->password], $rememberme)) {
            $user         = User::findOrFail(auth()->user()->id);
            $user->active = 1;
            $user->save();

            if($web_token){
                $token = UserToken::where('user_id',$user->id)->where('device_id',$web_token)->first();
                if(!$token)
                    UserToken::create(['device_id'=>$web_token,'device_type'=>'web','user_id'=>$user->id]);
            }
            
            return redirect()->route('dashboard');
        } else {
            if (User::where('email', $request->email)->count() == 0) {
                session()->flash('error_email', 'تحقق من صحة البريد الالكتروني');
            } else {
                session()->flash('error_password', 'تحقق من صحة كلمة المرور');
            }
            return redirect()->route('loginForm');
        }
    }

    public function logout()
    {
        auth()->guard()->logout();
        return redirect('/admin');
    }
}
