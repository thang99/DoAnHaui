<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'ram' => 'required',
            'cpu' =>'required',
            'image' => 'required',
            'price' => 'required',
            'origin' =>'required',
            'hard_drive'=>'required',
            'screen'=>'required',
            'operator_system'=>'required',
            'status'=> 'required',
            'description'=>'required',
            'year'=>'required',
            'quantity' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên của sản phẩm không được để trống',
            'ram.required' => 'Ram của sản phẩm không được để trống',
            'cpu.required' => 'CPU của sản phẩm không được để trống',
            'image.required' => 'Hình ảnh của sản phẩm không được để trống',
            'price.required' => 'Giá của sản phẩm không được để trống',
            'origin.required' => 'Nguồn gốc của sản phẩm không được để trống',
            'hard_drive.required' => 'Ổ cứng của sản phẩm không được để trống',
            'screen.required' => 'Màn hình của sản phẩm không được để trống',
            'operator_system.required' => 'Hệ điều hành của sản phẩm không được để trống',
            'status.required' => 'Trạng thái của sản phẩm không được để trống',
            'description.required' => 'Mô tả của sản phẩm không được để trống',
            'year.required' => 'Năm sản xuất của sản phẩm không được để trống',
            'quantity.required' => 'Số lượng của sản phẩm không được để trống',
        ];
    }
}
