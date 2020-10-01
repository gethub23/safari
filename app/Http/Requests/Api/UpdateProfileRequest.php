<?php

namespace App\Http\Requests\Api;

class UpdateProfileRequest extends ApiMasterRequest
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
            'name'          => 'required',
            'phone'         => 'required|unique:users,phone,'.auth()->id(),
            'whatsapp'      => 'required_if:type,==,provider',
        ];
    }
}
