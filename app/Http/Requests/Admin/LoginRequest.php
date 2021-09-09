<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'email.email' => 'Sai định dạng email',
            'email.exitsts' => 'Email không tồn tại',
            'password.min' => 'Mật khẩu phải phải dài hơn 6 ký tự'
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu',
           
        ];
    }
}
