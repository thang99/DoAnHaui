<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password|min:8',
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Mật khẩu không được để trống',
            'new_password.min' => 'Mật khẩu tối thiểu phải là 8 ký tự',
            'confirm_password.required' => 'Xác nhận lại mật khẩu không được để trống',
            'confirm_password.same' => 'Mật khẩu không trùng với mật khẩu ở trên',
            'confirm_password.min' => 'Xác nhận mật khẩu tối thiểu là 8 ký tự',
        ];
    }
}
