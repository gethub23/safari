<?php

namespace App\Http\Requests\Api;

class RegisterRequest extends ApiMasterRequest
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
            'name'          => 'required|string',
            'phone'         => 'required|unique:users,phone',
            'password'      => 'required|min:6',
            'device_id'     => 'required',
            'avatar'        => 'nullable',
            'type'          => 'required|in:user,provider',
        ];
    }
}
