<?php

namespace App\Observers;
use App\Models\Category;
use File;

class CategoryObserver
{
    public function creating(Category $category)
    {

    }

    public function created (Category $category)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'باضافة قسم جديد ' . $category->name . ' رقم ' . $category->id, request()->ip());
        }
    }

    public function updating (Category $category)
    {

    }

    public function updated (Category $category)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'تعديل  بيانات قسم  ' . $category->name . ' رقم ' . $category->id, request()->ip());
        }
    }

    public function saving (Category $category)
    {

    }

    public function saved (Category $category){

    }

    public function deleting(Category $category)
    {
        if (auth()->user()) {
            addReport(auth()->user()->id, 'قام بحذف قسم ' . $category->name . ' رقم ' . $category->id, request()->ip());
        }
    }

    public function deleted (Category $category)
    {

    }

    public function restoring  (Category $category)
    {

    }

    public function restored(Category $category)
    {

    }
    
}
