<?php

namespace App\Observers;
use App\Models\Admin;
use File;

class AdminObserver
{

    public function creating(Admin $admin)
    {

    }

    public function created (Admin $admin)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'باضافة مشرف جديد ' . $admin->name . ' رقم ' . $admin->id, request()->ip());
        }
    }

    public function updating (Admin $admin)
    {

    }

    public function updated (Admin $admin)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'تعديل  بيانات مشرف  ' . $admin->name . ' رقم ' . $admin->id, request()->ip());
        }
    }

    public function saving (Admin $admin)
    {

    }

    public function saved (Admin $admin){

    }

    public function deleting(Admin $admin)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'قام بحذف مشرف ' . $admin->name . ' رقم ' . $admin->id, request()->ip());
            File::delete(public_path('images/users/' . $admin->image));
        }
    }

    public function deleted (Admin $admin)
    {

    }

    public function restoring  (Admin $admin)
    {

    }

    public function restored(Admin $admin)
    {

    }
}
