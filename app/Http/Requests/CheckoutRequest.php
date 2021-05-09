<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'address'=>'required',
            'phone'=>'required|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người nhận hàng không được để trống',
            'address.required' => 'Địa chỉ người nhận hàng không được để trống',
            'phone.required' => 'Điện thoại người nhận hàng không được để trống',
            'phone.digits' => 'Số điện thoại phải gồm 10 số'
        ];
    }
}
