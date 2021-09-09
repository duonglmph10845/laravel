<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            // thì b validate cái string thôi còn ảnh với file ảnh thì file manager tự validate r vậy là ok
            'name' => 'required|max:255',
            'image' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'quantity' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự',
           
            'image.max' => 'Ảnh quá lớn size<=10000 ',
            'price.integer' => 'Hãy nhập số nguyên',
            'price.min' => 'Giá phải lớn hơn 0'
            
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên Sản Phẩm',
            'image' => 'Ảnh Sản Phẩm',
            'price' => 'Giá Sản Phẩm',
            'address' => 'Địa chỉ',
            'quantity' => 'Sô lượng sản phẩm',
            'category_id' => 'category_id',
           
        ];
    }
}
