<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Report;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Notifications;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

function Home()
{
    $colors =[
        '#fd625e','#e91e63','#01b8aa','#2273c2','#28383c','#18152C','#66bb6a','#af6a8f','#4e7cff','#7033ff','#f65164','#00a5ce','#950097'
    ];
    $home =[
        [
            'name'=>'الأقسام',
            'count'=>Category::count(),
            'icon'=>'<i class="fa fa-th-large" aria-hidden="true"></i>',
            'url'=>'admin/users',
              'color'=>$colors[array_rand($colors)],
        ],[
            'name'=>'المستخدمين',
            'count'=>User::where('role', 0)->where('type','user')->count(),
            'icon'=>'<i class="fa fa-users" aria-hidden="true"></i>',
            'url'=>'admin/users',
              'color'=>$colors[array_rand($colors)],
        ],[
            'name'=>'المشرفين',
            'count'=>User::where('role','!=',0)->where('type','admin')->count(),
            'icon'=>'<i class="fa fa-users" aria-hidden="true"></i>',
            'url'=>'admin/admins',
            'color'=>$colors[array_rand($colors)],
        ],[
            'name'=>'التقارير',
            'count'=>Report::count(),
            'icon'=>'<i class="fa fa-pencil" aria-hidden="true"></i>',
            'url'=>'admin/all-reports',
            'color'=>$colors[array_rand($colors)],
        ],
    ];

    return $blocks[]=$home;
}

function lang(){
	return App::getLocale();
}

function Role()
{
    $role = Role::findOrFail(Auth::user()->role);
    if(count($role) > 0)
    {
        return $role->role;
    }else{
        return 'عضو';
    }
}

function reports () {
    $reports = Report::orderBy('id', 'desc')->take(8)->get();
    return $reports;
}

function addReport($user_id,$event, $ip)
{
    if ($ip == "127.0.0.1") {
        $ip = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
    }

    $location = \Location::get($ip);
	$report = new Report;
	$user = User::findOrFail($user_id);
    if($user->role > 0)
    {
        $report->user_id = $user->id;
        $report->event   = 'قام '.$user->name .' '.$event;
        $report->supervisor = 1;
        $report->ip = $ip;
        $report->country = ($location->countryCode != null) ? $location->countryCode : '';
        $report->area = ($location->regionName != null) ? $location->regionName : '';
        $report->city = ($location->cityName != null) ? $location->cityName : '';
        $report->save();
    }else
    {
        $report->user_id = $user->id;
        $report->event   = 'قام '.$user->name .' '.$event;
        $report->supervisor = 0;
        $report->ip = $ip;
        $report->country = ($location->countryName != null) ? $location->countryName : 'localhost';
        $report->area = ($location->regionName != null) ? $location->regionName : 'localhost';
        $report->city = ($location->cityName != null) ? $location->cityName : 'localhost';
        $report->save();
    }

}

function currentRoute()
{
    $routes = Route::getRoutes();
    foreach ($routes as $value)
    {
        if($value->getName() === Route::currentRouteName())
        {
            echo $value->getAction()['title'] ;
        }
    }
}

function convert2english($string) {
    $newNumbers = range(0, 9);
    $arabic = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $string =  str_replace($arabic, $newNumbers, $string);
    return $string;
}

function is_unique($key,$value){
    $user                = User::where($key , $value)->first();
    if(  $user   )
    {
        return 1;
    }
    return 0;
}

function generate_code() {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $token = '';
    $length = 6;
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, $charactersLength - 1)];
    }
    return $token;
}

function appPath() {
    //    return url('/public');
    return url('/public');
}

function settings($key)
{
    return \App\Models\AppSetting::where('key', $key)->first()->value;
}

function imageUrl($path ,$image = null)
{
    if (!is_null($image))
        return $image_path = url('public/images/'.$path.'/'.$image);
    else
        return $image_path = url('public/images/'.$path.'/default.png');
}

function set_notification( $type ,$sender_id,$reciver_id){
    if ($type == 0){
        $title_ar  = 'اشعار اداري ';
        $title_en  = 'Administrative notice';
        $body_ar   = 'اشعار اداري ' ;
        $body_en   = 'Administrative notice';
        $title     = trans('notify.Administrative_notice');
        $body      = trans('notify.Administrative_notice');
    }

    $user = User::find($reciver_id);
    if ($user){
        $notification               = new Notifications();
        $notification->title_ar     = $title_ar;
        $notification->title_en     = $title_en;
        $notification->body_ar      = $body_ar;
        $notification->body_en      = $body_en;
        $notification->sender_id    = $sender_id;
        $notification->reciver_id   = $reciver_id;
        $notification->type         = $type;

        if ($notification->save()){
            foreach ($user->devices as $device)
            $key                = $device->device_id;
            $interestDetails    = ["$reciver_id" , $key];
            $expo               = \ExponentPhpSDK\Expo::normalSetup();
            $expo->subscribe($interestDetails[0], $interestDetails[1]);
            $notification       = ['body' => $body, 'title' => $title, 'sound' => 'default', 'channelId' => 'orders', 'data' => [ 'type' => $type]];
            $expo->notify($interestDetails[0], $notification);
            return true;
        }
    }
}

function send_mobile_sms($numbers,$msg) {
    $url = 'http://api.yamamah.com/SendSMS';
    $fields = array(
        "Username" => settings('sms_number'),
        "Password" => settings('sms_password'),
        "Message" => $msg,
        "RecepientNumber" => '966'.ltrim($numbers,'0'),
        "ReplacementList" => "",
        "SendDateTime" => "0",
        "EnableDR" => False,
        "Tagname" => settings('sms_sender_name'),
        "VariableList" => "0"
    );

    $fields_string = json_encode($fields);
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => $fields_string
    ));
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

function Translate( $text, $lang )
{
    $api = 'trnsl.1.1.20190807T134850Z.8bb6a23ccc48e664.a19f759906f9bb12508c3f0db1c742f281aa8468';

    $url  = file_get_contents( 'https://translate.yandex.net/api/v1.5/tr.json/translate?key=' . $api
        . '&lang=ar' . '-' . $lang . '&text=' . urlencode( $text ) );
    $json = json_decode( $url );
    return $json -> text[ 0 ];
}


function rate($id)
{
    $user = User::find($id);
    $services = $user->services ;
    $rate = 0 ;
    foreach ($services as $key => $value) {
        $rate = $rate + $value->rates->avg('rate');
    }
    $totalRate = $rate / $user->services->count() ; 
    return $totalRate ;
}







