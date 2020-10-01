<?php

namespace App\Http\Controllers\Admin;

use App\Models\Intro;
use App\Helpers\UploadFile;
use App\Http\Requests\Admin\Intros\Store;

class IntrosController extends AdminBasicControllerUrl
{
    public function __construct(Intro $model){
        $this->model = $model;
        view()->share([
            'singleName'    => 'صفحه مقدمه',
            'pluralName'    => 'صفحات المقدمه ',
        ]);
    }

    public function store(Store $request)
    {
        $requests            = $request->all();
        $requests['image']   =  UploadFile::uploadImage($request->file('image'), 'intros');
        $this->model->create($requests);
        return Response()->json();
    }

    public function update($id,Store $request)
    {
        $data = $request->all();
        $intro = $this->model->findOrFail($id);
        $data['image'] = $request->has('image') ? UploadFile::uploadImageOnUpdate($intro->image,$request->file('image'), 'intros') : $intro->image ;
        $intro->update($data);
        return Response()->json();
    }
}
