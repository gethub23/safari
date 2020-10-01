<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends ApiMasterRequest
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
             'name_ar'          => 'required|string',
             'name_en'          => 'required|string',
             'whatsapp'         => 'required',
             'price'            => 'required',
             'description_ar'   => 'required',
             'description_en'   => 'required',
             'category_id'      => 'required|exists:categories,id',
             'sub_category_id'  => 'required|exists:sub_categories,id',
             'latitude'         => 'nullable',
             'longitude'        => 'nullable',
        ];
    }
}
