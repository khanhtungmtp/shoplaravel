<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required',
            'description' => 'required',
            'content'     => 'required',
            'price'       => 'required',
            'quantity'    => 'required',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min'      => ':attribute phải từ 4-255 ký tự',
            'max'      => ':attribute phải từ 4-255 ký tự',
            'unique'   => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name'        => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'content'     => 'Nội dung sản phẩm',
            'price'       => 'Giá sản phẩm',
            'image'      => 'Hình sản phẩm',
            'quantity'    => 'Số lượng sản phẩm',
            'category_id' => 'Danh mục sản phẩm'
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
