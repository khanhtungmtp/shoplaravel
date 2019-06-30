<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * ignore id, ko kiểm tra trùng nếu trường hợp update
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4|max:50|unique:categories,name,'.($this->id ?? ''),
            'icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute phải từ 4-50 ký tự',
            'max' => ':attribute phải từ 4-50 ký tự'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'icon' => 'Icon',
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
