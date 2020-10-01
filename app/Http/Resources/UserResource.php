<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                 => (int)       $this -> id,
            'name'               => (string)    $this -> name,
            'phone'              => (string)    $this -> phone,
            'avatar'             => (string)    $this ->avatar(),
            // 'category'           => (int)       $this -> category->name,
            'category_id'        => (int)       $this -> country_id,
            'latitude'           => (string)    $this -> latitude,
            'longitude'          => (string)    $this -> longitude,
            'active'             => (int)       $this ->active,
            'whatsapp'           => (int)       $this ->whatsapp,
            'lang'               => (string)    $this ->lang,
            'isNotify'           => $this ->isNotify,
            'token'              => (string)    $this ->token,
        ];
    }
}
