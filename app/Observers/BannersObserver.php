<?php

namespace App\Observers;
use App\Models\Banner;
use File;

class BannersObserver
{
    public function creating(Banner $Banner)
    {

    }

    public function created (Banner $Banner)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'باضافة بانر اعلاني جديد ' . $Banner->title . ' رقم ' . $Banner->id, request()->ip());
        }
    }

    public function updating (Banner $Banner)
    {

    }

    public function updated (Banner $Banner)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'تعديل  بيانات بانر اعلاني   ' . $Banner->title . ' رقم ' . $Banner->id, request()->ip());
        }
    }

    public function saving (Banner $Banner)
    {

    }

    public function saved (Banner $Banner){

    }

    public function deleting(Banner $Banner)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'قام بحذف بانر اعلاني  ' . $Banner->title . ' رقم ' . $Banner->id, request()->ip());
            File::delete(public_path('images/banners/' . $Banner->image));
        }
    }

    public function deleted (Banner $Banner)
    {

    }

    public function restoring  (Banner $Banner)
    {

    }

    public function restored(Banner $Banner)
    {

    }
}
