<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('user.auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 2;
        $user->save();

        return redirect()->back()->with('status','Đăng ký tài khoản thành công');
    }
}
