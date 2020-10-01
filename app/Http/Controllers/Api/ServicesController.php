<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Models\User;
use App\Models\Service;
use App\Models\Addition;
use App\Models\Favorite;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Api\StoreServiceRequest;

class ServicesController extends BaseController
{
    public function ProvidersBySubCategory(Request $request)
    {

        $rules = [
            'sub_category_id' => 'required|exists:sub_categories,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return $this->sendError('', $validator->errors()->first());

        $providers = User::whereHas('services', function (Builder $query) use($request) {
             $query->where('sub_category_id', $request->sub_category_id);
        })->get()->map(function($provider){
            return [
                'id'      => $provider->id ,
                'name'    => $provider->name ,
                'rate'    => rate($provider->id) ,
                'avatar'  => url('public/images/user/'.$provider->avatar),
            ];
        });
        return $this->sendResponse($providers, '');
    }

    public function providerServices(Request $request)
    {
        $rules = [
            'provider_id' => 'required|exists:users,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return $this->sendError('', $validator->errors()->first());

        $provider = User::with('services')->findOrFail($request->provider_id);
        $services = $provider->services->map(function($service){
            return [
                'id'     => $service->id   ,
                'name'   => $service->name ,
                'price'  => $service->price ,
                'isFav'  => $service->isFav() ,
                'image'  => url('public/images/services/',$service->images->first()->image),
            ];
        });
        $data = [
            'provider' => [
                'id'      => $provider->id ,
                'name'    => $provider->name ,
                'rate'    => rate($provider->id) ,
                'avatar'  => url('public/images/user/'.$provider->avatar),
            ],
            'services'    => $services 
        ];

        return $this->sendResponse($data, '');
    }

    public function serviceDetailes(Request $request){
        $rules = [
            'service_id' => 'required|exists:services,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return $this->sendError('', $validator->errors()->first());


        $service = Service::find($request->service_id) ;
        $data    = [
                'id'            => $service->id   ,
                'name'          => $service->name ,
                'description'   => $service->description ,
                'price'         => $service->price ,
                'whatsapp'      => $service->whatsapp ,
                'isFav'         => $service->isFav() ,
                'images'        => $service->images->map(function($image){
                        return [
                            'image' => url('public/images/services/',$image->image),
                        ];
                }), 
                'additions'     => $service->additions->map(function($addition){
                        return [
                            'addition' => $addition->addition,
                            'image'    => url('public/images/services/',$addition->image),
                        ];
                }), 

        ] ;

         return $this->sendResponse($data, '');
    }

    public function favAndUnFav(Request $request)
    {
        $rules = [
            'service_id' => 'required|exists:services,id',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return $this->sendError('', $validator->errors()->first());

        $service = Favorite::where(['user_id' => auth()->id() ,'service_id' => $request->service_id])->first() ;
        if ($service) {
            $service->delete();
            return $this->sendResponse('', __('apis.endFav'));
        }else{
            Favorite::create(['user_id' => auth()->id() ,'service_id' => $request->service_id]);
            return $this->sendResponse('', __('apis.addFav'));
        }
    }

    public function search(Request $request)
    {
         $services1 = Service::where('name_ar', 'LIKE', '%' . $request->keyword . '%')->orWhere( 'name_en', 'LIKE', '%' . $request->keyword  . '%')->get();

         $services2 = Service::where('description_ar', 'LIKE', '%' . $request->keyword . '%')->orWhere( 'description_en', 'LIKE', '%' . $request->keyword  . '%')->get();

        $services = $services1->merge($services2);

         if($request->latitude && $request->longitude){
            $services3 = Service::select(DB::raw('*, ( 6367 * acos( cos( radians('.$request->latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$request->longitude.') ) + sin( radians('.$request->latitude.') ) * sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<', 50)
                ->orderBy('distance')
                ->get();
            $services = $services3->merge($services);
        }
        return $this->sendResponse($services,'');
    }
    
    public function myServices()
    {
        $services = auth()->user()->services->map(function($service){
            return [
                'id'     => $service->id   ,
                'name'   => $service->name ,
                'price'  => $service->price ,
                'image'  => url('public/images/services/',$service->images->first()->image),
            ];
        });
        return $this->sendResponse($services, '');
    }

    public function storeService(StoreServiceRequest $request)
    {
       $request['user_id'] = auth()->id();
       $service = Service::create($request->all());
       $images = [];
       foreach ($request->images as $image)
       {
           $images[]['image'] = UploadFile::uploadBase64($image, 'services');
       }
       $service->images()->createMany($images);
        if($request->additions)
        {
            foreach ($request->additions as $addition)
            {
                    Addition::create([
                        'image'        => UploadFile::uploadBase64($addition['image'], 'services') ,
                        'addition_ar'  => $addition['addition_ar'] ,
                        'addition_en'  => $addition['addition_en'] ,
                        'price'        => $addition['price'] ,
                        'service_id'   => $service->id ,
                    ]);
            }
        }

        return $this->sendResponse('', __('apis.addService'));

    }

}
