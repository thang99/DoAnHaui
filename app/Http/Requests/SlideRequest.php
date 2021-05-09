<?php

namespace App\Http\Requests;

use App\Models\Slide;
use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
        $slide = Slide::where('id','=',$this->id)->first();
        if($slide->image) {
            $rules = [
                'name' => 'required',
                'content' => 'required',
                'link' => 'required'
            ];
        } else {
            $rules = [
                'name' => 'required',
                'content' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg',
                'link' => 'required'
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên slide không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'image.required' => 'Ảnh của slide không được để trống',
            'image.image' => 'Đây không phải là file hình ảnh',
            'image.mimes' => 'Ảnh không đúng định dạng',
            'link.required' => 'Link hình ảnh không được để trống'
        ];
    }
}
