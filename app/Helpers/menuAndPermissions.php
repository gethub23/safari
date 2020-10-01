<?php

use Illuminate\Support\Facades\Route;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

function sidebar()
{
    $routes         = Route::getRoutes();
    $routes_data    = [];
    $my_routes     = Permission::where('role_id', Auth::user()->role)->pluck('permissions')->toArray();
    foreach($routes as $route){
        if($route->getName())
            $routes_data[$route->getName()]=[
                'title'         =>isset($route->getAction()['title'])?$route->getAction()['title'] :null,
                'subTitle'      =>isset($route->getAction()['subTitle'])?$route->getAction()['subTitle'] :null,
                'icon'          =>isset($route->getAction()['icon'])?$route->getAction()['icon'] :null,
                'subIcon'       =>isset($route->getAction()['subIcon'])?$route->getAction()['subIcon'] :null,
                'name'          =>$route->getName() ?? null,
            ];
    }

    foreach ($routes as $value) {
        if ($value->getName() !== null) {

            //display only parent routes
            if (isset($value->getAction()['title']) && isset($value->getAction()['icon']) && isset($value->getAction()['type']) && $value->getAction()['type']=='parent') {

                //display route with sub directory
                if (isset( $value->getAction()['sub_route']) && $value->getAction()['sub_route']==true && isset($value->getAction()['child']) && count($value->getAction()['child'] ) ) {

                    // check user auth to access this route
                    if (in_array($value->getName(), $my_routes)) {

                        $active = $value->getName() == Route::currentRouteName() ||  in_array(Route::currentRouteName(), $value->getAction()['child'])? 'selected open' : '';
                        echo '<li class="menu '. $active.'" >
                                <a href="javascript:void(0);">' . $value->getAction()['icon'] .'<span class="nav-text font-weight-bold"> ' . awtTrans($value->getAction()['title']) . ' </span> '. '</a>
                                <ul class="sub-menu">';

                        //display child sub directories
                        foreach ($value->getAction()['child'] as $child)
                            if (isset($routes_data[$child]) && $routes_data[$child]['title'] && $routes_data[$child]['icon'])
                                echo '<li><a href="'. route($child).'">' . $routes_data[$child]['icon'] . '<span class="nav-text"> ' . awtTrans($routes_data[$child]['title']) . ' </span> </a></li>';

                        echo '</ul></li>';
                    }
                }
                else  {
                    if (in_array($value->getName(), $my_routes)) {
                        $active = $value->getName() == Route::currentRouteName() ? 'selected' : '';
                        echo '<li class="'.$active.'"><a href="' . route($value->getName()) . '" class="waves-effect">' . $value->getAction()['icon'] . '</i> <span class="font-weight-bold"> ' . awtTrans($value->getAction()['title']) . ' </span> </a></li>';
                    }
                }
            }
        }
    }
}

function editPermission($id)
{
    $routes         = Route::getRoutes();
    $routes_data    = [];
    $my_routes      = Permission::where('role_id', $id)->pluck('permissions')->toArray();
    foreach($routes as $route)
        if($route->getName())
            $routes_data[$route->getName()]=['title'=>isset($route->getAction()['title'])?$route->getAction()['title'] :null];

    foreach ($routes as $value) {

        if(isset($value->getAction()['title']) &&  isset($value->getAction()['type']) && $value->getAction()['type']=='parent'){

            $select = in_array($value->getName(),$my_routes)  ? 'checked' : '';
            echo '
                    <div class="col-md-3 px-xl-3">
                        <div class="card package bg-white shadow">
                            <div class="package-header bg-primary lighten-1 text-white">
        
                                <div class="checkbox checkbox-replace checkbox-danger">
                                    <input type="checkbox" name="permissions[]" value="'.$value->getName().'" id="'.$value->getName().'" class="parent" '. $select.'>
                                    <label for="'.$value->getName().'">'. awtTrans($value->getAction()["title"]) .'</label>
                                </div>
                            </div>';


            if(isset($value->getAction()['child']) && count($value->getAction()['child'] ) ){

                echo '<ul class="package-items package-items text-grey text-darken-3">';

                foreach($value->getAction()['child']  as $key=>$child){
                    $select = in_array($child,$my_routes)  ? 'checked' : '';
                    echo '  <li>
                            <div class="checkbox checkbox-replace checkbox-danger">
                                <input type="checkbox" name="permissions[]" value="'.$child.'"  id="'.$value->getName().$key.'" class="'.$value->getName().'"'. $select.'>
                                <label for="'.$value->getName().$key.'">'.awtTrans($routes_data[$child]["title"]).'</label>
                            </div>
                        </li>';
                }
                echo '</ul>';
            }

            echo '</div></div>';
        }
    }
}

function addPermission()
{
    $routes         = Route::getRoutes();
    $routes_data    = [];
    foreach($routes as $route)
        if($route->getName())
            $routes_data[$route->getName()]=['title'=>isset($route->getAction()['title'])?$route->getAction()['title'] :null];

    foreach ($routes as $value) {

        if(isset($value->getAction()['title']) &&  isset($value->getAction()['type']) && $value->getAction()['type']=='parent'){

            echo '
                    <div class="col-md-3 px-xl-3">
                        <div class="card package bg-white shadow">
                            <div class="package-header bg-primary lighten-1 text-white">
        
                                <div class="checkbox checkbox-replace checkbox-danger">
                                    <input type="checkbox" name="permissions[]" value="'.$value->getName().'" id="'.$value->getName().'" class="parent">
                                    <label for="'.$value->getName().'">'. awtTrans($value->getAction()["title"]) .'</label>
                                </div>
                            </div>';


            if(isset($value->getAction()['child']) && count($value->getAction()['child'] ) ){

                echo '<ul class="package-items package-items text-grey text-darken-3">';

                foreach($value->getAction()['child']  as $key=>$child){

                    echo '  <li>
                                <div class="checkbox checkbox-replace checkbox-danger">
                                    <input type="checkbox" name="permissions[]" value="'.$child.'"  id="'.$value->getName().$key.'" class="'.$value->getName().'">
                                    <label for="'.$value->getName().$key.'">'.awtTrans($routes_data[$child]["title"]).'</label>
                                </div>
                            </li>';
                }
                echo '</ul>';
            }

            echo '</div></div>';
        }
    }
}


