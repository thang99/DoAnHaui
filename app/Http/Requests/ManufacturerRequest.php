<?php

namespace App\Http\Requests;

use App\Models\Manufacturer;
use Illuminate\Foundation\Http\FormRequest;

class ManufacturerRequest extends FormRequest
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
        $manufacturer = Manufacturer::where('id','=',$this->id)->first();
        if($manufacturer->logo) {
            $rules = [
                'name' => 'required',
                'founded_year' => 'required',
                'ceo' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'required',
                'founded_year' => 'required',
                'ceo' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg'
            ];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên hãng sản xuât không được để trống',
            'founded_year.required' => 'Năm thành lập không được để trống',
            'ceo.required' => 'CEO không được để trống',
            'logo.required' => 'Logo không được để trống',
            'logo.image' => 'logo không phải là hình ảnh',
            'logo.mimes' => 'logo không đúng đinh dạng'
        ];
    }
}
