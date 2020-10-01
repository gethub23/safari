<?php

namespace App\Observers;
use App\Models\User;
use File;

class UserObserver
{

    public function creating(User $user)
    {

    }

    public function created (User $user)
    {
        if (auth()->user()){
             addReport(auth()->user()->id, 'باضافة مستخدم جديد ' .$user->name .' رقم ' .$user->id, request()->ip());
        }
    }

    public function updating (User $user)
    {

    }

    public function updated (User $user)
    {
        if (auth()->user()){
            addReport(auth()->user()->id, 'تعديل  بيانات مستخدم  ' .$user->name .' رقم ' .$user->id, request()->ip());
        }
    }

    public function saving (User $user)
    {

    }

    public function saved (User $user){

    }

    public function deleting(User $user)
    {
        if (auth()->user()){
            addReport(auth()->user()->id, 'قام بحذف مستخدم ' . $user->name . ' رقم ' . $user->id, request()->ip());
            File::delete(public_path('images/users/' . $user->image));
        }
    }

    public function deleted (User $user)
    {

    }

    public function restoring  (User $user)
    {

    }

    public function restored(User $user)
    {

    }
}
