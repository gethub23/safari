<?php

namespace App\Http\Requests\Admin\Admins;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name'      => 'required|min:2|max:190',
            'phone'     => 'required|unique:users,phone,'.$this->id,
            'email'     => 'required|email|unique:users,email,'.$this->id,
            'avatar'    => 'nullable|image'
        ];
    }
    public function messages()
    {
        return [
            'name.required'      => 'يجب ادخال اسم المستخدم',
            'phone.required'     => 'يجب ادخال رقم الهاتف',
            'phone.unique'       => 'الهاتف مستخدم من قبل ',
            'email.required'     => 'يجب ادخال البريد الالكتروني',
            'email.unique'       => 'البريد  مستخدم من قبل ',
            'avatar.image'       => 'يجب تحميل الصور فقط',
        ];
    }
}
