<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('user.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $loginAdmin = ['email' => $email, 'password' => $password, 'role' =>0 ];
        $loginEmployee = ['email' => $email, 'password' => $password, 'role' =>1 ];
        $loginUser = ['email' => $email, 'password' => $password, 'role' =>2 ];

        if(Auth::attempt($loginAdmin)) {
            return redirect()->route('home.index')->with('status','Đăng nhập thành công');
        }else if(Auth::attempt($loginEmployee)) {
            return redirect()->route('home.index')->with('status','Đăng nhập thành công');
        }else if(Auth::attempt($loginUser)) {
            return redirect()->route('home.index')->with('status','Đăng nhập thành công');
        }else {
            return redirect()->back()->with('status','Tên tài khoản hoặc mật khẩu không chính xác');
        }
    }
}
