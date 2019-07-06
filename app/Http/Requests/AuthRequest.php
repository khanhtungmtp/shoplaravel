<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email'    => ':attribute không hợp lệ',
            'unique'    => ':attribute đã được đăng ký',

        ];
    }

    public function attributes()
    {
        return [
            'name'     => 'Họ tên',
            'email'    => 'Email',
            'phone'    => 'Số điện thoại',
            'password' => 'Mật khẩu',
        ];
    }
}
