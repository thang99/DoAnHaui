<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
 
        return redirect()->route('users.index')->with('status','Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile.index',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit-profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->gender = $request->input('gender');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('status','Cập nhật thông tin cá nhân thành công');
    }

    public function updatePassword(PasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('alert','Cập nhật mật khẩu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->role === 0) {
            return redirect()->route('users.index')->with('status','Không thể xóa người dùng có quyền admin');
        } else if($user->id === Auth::id()) {
            return redirect()->route('users.index')->with('status','Không thể xóa chính mình');
        } else {
            $user->delete();
        }
        
        return redirect()->route('users.index')->with('status','Xóa thành công');
    }

    public function search()
    {
        $search_text = $_GET['email'];

        $users = User::where('email','LIKE','%'.$search_text.'%')->paginate(7);

        return view('admin.user.search',compact('users'));
    }

    public function editAdmin($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile.edit-profile',compact('user'));
    }

    public function updateProfileAdmin(ProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('status','Cập nhật thông tin cá nhân thành công');
    }

    public function updatePasswordAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedPassword = $request->validate([
            'password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('Mật khẩu hiện tại không đúng.'));
                }
            }],
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password|min:8'
        ]);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('alert','Cập nhật mật khẩu thành công');
    }
}
