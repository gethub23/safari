<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ApiMasterRequest extends FormRequest
{
    public function expectsJson()
    {
        return true;
    }


    protected function failedValidation(Validator $validator)
    {
        $response = [
            'success'   => false,
            'message'   => $validator->errors()->first(),
            'data'      => [],
            'extra'     => [],
        ];
        throw new HttpResponseException(response()->json($response, 200));
    }
}
