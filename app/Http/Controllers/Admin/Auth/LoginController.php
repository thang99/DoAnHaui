<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        $loginAdmin = ['email' => $email, 'password' => $password, 'role' =>0 ];
        $loginEmployee = ['email' => $email, 'password' => $password, 'role' =>1 ];
        if(Auth::attempt($loginAdmin)) {
            return redirect()->route('dashboard.index')->with('status','Đăng nhập thành công');
        }else if(Auth::attempt($loginEmployee)) {
            return redirect()->route('dashboard.index')->with('status','Đăng nhập thành công');
        }   
    }
}
