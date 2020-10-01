<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminBasicControllerUrl extends Controller
{
    protected $model;

    public function __construct(Model $model){
       $this->model = $model;
    } 
    // اسم ال moddel
    protected function modelName(){
        return class_basename($this->model);
    }   

    //  جمع اسم ال model
    protected function PluralModelName(){
        return str_plural($this->modelName());
    }
    
    //اسم الفولدر في ال views
    protected function getFolderNameFromModel(){
        return strtolower($this->PluralModelName());
    }

    public function index()
    {  
      view()->share([
          'routeName'   => $this->getFolderNameFromModel(),
          'rows'        => $this->model::all(),
          ]);
      return  view('dashboard.'.$this->getFolderNameFromModel().'.index');
    }

    public function destroy($id)
    {
        $this->model::destroy($id);
        return response()->json('success');
    }

    public function deleteAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if ($this->model::whereIn('id', $ids)->delete()) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
