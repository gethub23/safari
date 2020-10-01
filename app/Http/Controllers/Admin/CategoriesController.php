<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\Admin\Category\Store;

class CategoriesController extends AdminBasicControllerUrl
{
    public function __construct(Category $model){
        $this->model = $model;
        view()->share([
            'singleName'    => 'قسم',
            'pluralName'    => 'الاقسام',
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
