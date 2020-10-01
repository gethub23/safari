<?php

namespace App\Http\Requests\Admin\Services;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'            => 'required|min:2|max:190',
            'name_en'            => 'required|min:2|max:190',
            'description_ar'     => 'required',
            'description_en'     => 'required',
            'price'              => 'required',
            'user_id'            => 'required|exists:users,id',
            'latitude'           => 'required',
            'longitude'          => 'required',
        ];
    }
}
