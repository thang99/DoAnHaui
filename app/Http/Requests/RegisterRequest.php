<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:5|max:20',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.min' => 'Tên người dùng tối thiểu 5 ký tự',
            'name.max' => 'Tên người dùng tối đa 20 ký tự',
            'gender.required' => 'Giới tính không được để trống',
            'birthday.required' => 'Ngày sinh không được để trống',
            'address.required' => 'Địa chỉ người dùng không được để trống',
            'phone.required' => 'Điện thoại người dùng không được để trống',
            'phone.digits' => 'Điện thoại cần phải là 10 số',
            'phone.numeric' => 'Điện thoại cần là chữ số',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu phải là 8 ký tự',
            'confirm_password.required' => 'Xác nhận lại mật khẩu không được để trống',
            'confirm_password.same' => 'Mật khẩu không trùng với mật khẩu ở trên',
            'confirm_password.min' => 'Xác nhận mật khẩu tối thiểu là 8 ký tự',
        ];
    }
}
