<?php

namespace App\Http\Requests\Admin\Banners;

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
            'title_ar'           => 'required|min:2|max:190',
            'title_en'           => 'required|min:2|max:190',
            'description_ar'     => 'required',
            'description_en'     => 'required',
            'image'              => 'nullable|image',
            'expire_date'        => 'nullable',
            'url'                => 'required|url',
        ];
    }
}
