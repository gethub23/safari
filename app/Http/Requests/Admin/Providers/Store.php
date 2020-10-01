<?php

namespace App\Http\Requests\Admin\Providers;

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
            'name'          => 'required|min:2|max:190',
            'phone'         => 'required|unique:users,phone',
            'password'      => 'required',
            'active'        => 'required',
            'avatar'        => 'nullable|image',
        ];
    }
}
