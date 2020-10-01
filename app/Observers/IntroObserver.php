<?php

namespace App\Observers;
use App\Models\Intro;
use File;

class IntroObserver
{

    public function creating(Intro $user)
    {

    }

    public function created (Intro $user)
    {
        if (auth()->user()){
             addReport(auth()->user()->id, 'باضافة صفحه مقدمه جديده ' .$user->title .' رقم ' .$user->id, request()->ip());
        }
    }

    public function updating (Intro $user)
    {

    }

    public function updated (Intro $user)
    {
        if (auth()->user()){
            addReport(auth()->user()->id, 'تعديل  بيانات صفحه مقدمه  ' .$user->title .' رقم ' .$user->id, request()->ip());
        }
    }

    public function saving (Intro $user)
    {

    }

    public function saved (Intro $user){

    }

    public function deleting(Intro $user)
    {
        if (auth()->user()){
            addReport(auth()->user()->id, 'قام بحذف صفحه مقدمه ' . $user->title . ' رقم ' . $user->id, request()->ip());
            File::delete(public_path('images/intros/' . $user->image));
        }
    }

    public function deleted (Intro $user)
    {

    }

    public function restoring  (Intro $user)
    {

    }

    public function restored(Intro $user)
    {

    }
}
