<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\Admin\SubCategories\Store;


class SubCategoriesController  extends AdminBasicControllerUrl
{
    public function __construct(SubCategory $model){
        $this->model = $model;
        view()->share([
            'singleName'    => 'قسم فرعي',
            'pluralName'    => 'الاقسام الفرعيه',
            'categories'    => Category::get(),
        ]);
    }

    public function store(Store $request)
    {
        $this->model->create($request->all());
        return Response()->json();
    }

    public function update($id,Store $request)
    {
        $category = $this->model->findOrFail($id);
        $category->update($request->all());
        return Response()->json();
    }
}