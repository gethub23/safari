<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\ChatSupport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatSupportsController extends Controller
{
    public function index(){
        $id     = ChatSupport::select( DB::raw('MAX(id) AS id'))->groupby('room')->pluck('id')->toArray();
        $rooms  = ChatSupport::with('sender','receiver')->whereIn('id',$id)->latest()->get();
        foreach($rooms as $key=>$value)
            $rooms[$key]['unread'] = ChatSupport::where('room',$value->room)->where('admin_seen',0)->count();

        return view('dashboard.chat_support.index',compact('rooms'));
    }

    public function getChat(Request $request)
    {
        $messages = ChatSupport::with('sender','receiver')->where('room',$request->room)->get();
        ChatSupport::with('sender','receiver')->where('room',$request->room)->update(['admin_seen'=>1]);
        $client   =User::whereId($request->id)->first();
        $messages = view( 'dashboard.shared.ajax.chat.chat', compact( 'messages','client' ) ) -> render();
        return response( [ 'messages' => $messages ] );
    }

    public function sendMessage(Request $request)
    {

        $client = User::with('devices')->whereId($request->id)->firstOrFail();
        $msg    = ChatSupport::create([
                                        'room'          =>'room'.$client->id,
                                        'message'       =>$request->message,
                                        's_id'          =>Auth::id(),
                                        'r_id'          =>$client->id,
                                        'admin_seen'    =>1,
                                    ]);

        //send notification to user
        $not = [
            'title'=>'اسم المشروع',
            'body'=>'رسالة جديدة',
            'data'=>[],
            'type'=>'message'
        ];
//        notifyUser($client,$not);

        $messages = view( 'dashboard.shared.ajax.chat.single_message', compact( 'msg' ) ) -> render();
        return response( [ 'messages' => $messages ] );
    }
}
