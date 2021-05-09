<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            Auth::logout();

            return redirect()->route('home.index')->with('status','Đăng xuất thành công');
        }
    }
}
