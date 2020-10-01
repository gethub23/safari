<?php

namespace App\Http\Requests\Admin\Admins;

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
            'name'      => 'required|min:2|max:190',
            'phone'     => 'required|unique:users,phone',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required',
            'role'      => 'required',
            'avatar'    => 'nullable|image',
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
            'password.required'  => 'يجب ادخال كلمه السر ',
            'role.required'      => 'يجب تحديد الصلاحيه',
            'avatar.image'       => 'يجب تحميل الصور فقط',
        ];
    }
}
