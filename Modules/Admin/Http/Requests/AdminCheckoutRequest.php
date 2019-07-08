<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCheckoutRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
            'address' => 'required|min:5',
            'phone'   => 'required',
            'email'   => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'    => ':attribute không được bỏ trống',
            'min' => ':attribute quá ngắn',
        ];
    }

    public function attributes()
    {
        return [
            'name'    => 'Họ và tên',
            'address' => 'Địa chỉ',
            'phone'   => 'Số điện thoại',
            'email'   => 'Email',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
