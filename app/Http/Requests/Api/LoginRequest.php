<?php

namespace App\Http\Requests\Api;

class LoginRequest extends ApiMasterRequest
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
            'phone'             => 'required|exists:users,phone',
            'password'          => 'required|min:6',
            'device_id'         => 'required',
            'type'              => 'required|in:user,provider',
        ];
    }
}
