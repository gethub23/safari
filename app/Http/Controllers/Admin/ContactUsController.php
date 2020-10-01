<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Mail\SendEmail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $messages = ContactUs::latest()->get();
        return view('dashboard.contact_us.index', compact('messages'));
    }

    public function getMail(Request $request)
    {
        if ($request->type == 'seen')
            $messages = ContactUs::whereSeen(1)->latest()->get();
        elseif ($request->type == 'unseen')
            $messages = ContactUs::whereSeen(0)->latest()->get();
        else
            $messages = ContactUs::latest()->get();

        $messages = view( 'dashboard.shared.ajax.contact_us.messages', compact( 'messages' ) ) -> render();
        return response( [ 'messages' => $messages ] );
    }

    public function mailInfo(Request $request)
    {
        $message = ContactUs::whereId($request->id)->first();
        if($message)
            $message->update(['seen'=>1]);

        $messages = view( 'dashboard.shared.ajax.contact_us.message_info', compact( 'message' ) ) -> render();
        return response( [ 'message' => $messages ] );
    }

    public function sendMail(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required|max:190',
            'subject'       => 'required|max:190',
            'message'       => 'required',
        ]);
        
        Mail ::to( $request -> email ) -> send( new SendEmail( $request->subject,$request -> message ) );
        return back()->with('success','تم الارسال بنجاح');
    }

        public function deleteMail(Request $request)
    {
        ContactUs::whereIn('id',$request->deleted_id)->delete();
        return back()->with('success','تم الحذف بنجاح');
    }


}
