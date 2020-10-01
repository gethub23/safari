<?php
namespace App\Http\Controllers\Admin;
use App\Models\Role;
use App\Models\Admin;
use App\Helpers\UploadFile;
use App\Models\Notifications;
use http\Env\Response;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Admins\Store;
use App\Http\Requests\Admin\Admins\Update;
use App\Http\Controllers\Admin\AdminBasicControllerUrl;

class AdminsController extends AdminBasicControllerUrl
{
    public function __construct(Admin $model){
        $this->model = $model;
        view()->share([
                         'singleName'    => 'مشرف',
                         'pluralName'    => 'المشرفين',
                         'deleteMessage' => 'في حاله حذف المشرف سيفقد العضو جميع صلاحيات الدخول الي لوحه التحكم ',
                         'admins'        =>  $this->model->where('role', '!=', 0)->where('type','admin')->latest()->get(),
                         'roles'         =>  Role::latest()->get(),
                     ]);
    } 
    

    public function store(Store $request)
    {
        $requests             = $request->all();
        $requests['avatar']   = $request->hasFile('avatar') ? UploadFile::uploadImage($request->file('avatar'), 'users') : 'default.png';
        $requests['type']     =  'admin' ;
        $this->model->create($requests);
        return Response()->json();
    }

    
    public function update(Update $request, $id)
    {
        $data = $request->all();
        $user = $this->model->findOrFail($request->id);
        if ($request->has('avatar')) {
            $data['avatar'] = UploadFile::uploadImageOnUpdate($user->avatar,$request->file('avatar'), 'users');
        }
        $user->update($data);
        return Response()->json();
    }

}
