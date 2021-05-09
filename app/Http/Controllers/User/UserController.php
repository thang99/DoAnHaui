<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('user.layouts.user_profile.index',compact('user'));
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

        return view('user.layouts.user_profile.edit-profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(ProfileRequest $request, $id)
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

    public function updatePassword(Request $request, $id)
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllOrder()
    {
        if(Auth::user()) {
            $user_id = Auth::id();
            $orders = Order::with('orderDetails')->where('user_id','=',$user_id)->get();
            $arr = [];
            foreach($orders as $key=>$order) {
                $arr[$key] = $order->id;
            }
            $orders_detail = OrderDetail::with('product')->whereIn('order_id',$arr)->get();

            return view('user.layouts.user_order',compact('orders','orders_detail'));
        }
    }
}
