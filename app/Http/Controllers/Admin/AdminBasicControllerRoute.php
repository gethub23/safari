<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

class AdminBasicControllerRoute extends Controller
{
    protected $model;

    public function __construct(Model $model){
       $this->model = $model;
    } 

    public function destroy($id)
    {
        $this->model::destroy($id);
        addReport(auth()->user()->id, 'بحذف ', 'ip');
        return response()->json('success');
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if ($this->model::whereIn('id', $ids)->delete()) {
            addReport(auth()->user()->id, 'قام بحذف العديد ', $request->ip());
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
