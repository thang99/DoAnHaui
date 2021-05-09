<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [];
        $category = Category::where('id','=',$this->id)->first();
        if($category->image) {
            $rules = [
                'name' => 'required',
                'content' => 'required'
            ];
        } else {
            $rules = [
                'name' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg',
                'content' => 'required'
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'image.image' => 'Đây không phải là file ảnh',
            'image.mimes' => 'Hình ảnh không đúng định dạng',
            'content.required' => 'Nội dung không được để trống'
        ];
    }
}
