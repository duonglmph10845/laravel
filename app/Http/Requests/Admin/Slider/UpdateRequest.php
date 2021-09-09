<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'image' => 'required|max:10000',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'name.max' => 'Name không được vượt quá 255 ký tự',
            'image.max' => 'Ảnh quá lớn size<=10000 ',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên Sản Phẩm',
            'image' => 'Ảnh Sản Phẩm',
            'description' => 'description',
        ];
    }
}
