<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Manufacturer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $users = User::all();
        $orders = Order::all();
        $manufacturers = Manufacturer::all();
        $categories = Category::all();
        $comments = Comment::all();
        $ratings = Rating::all();
        $users_recently = User::orderByDesc('created_at')->take(10)->get();
        $orders_recently = Order::with('user')->orderByDesc('created_at')->take(10)->get();
        $products_sale = OrderDetail::with('product')->orderByDesc('quantity')->take(10)->get();
        // $products_sale = DB::table('orders_detail')->join('products','orders_detail.product_id','=','products.id')
        //                 ->orderBy('orders_detail.quantity','desc')
        //                 ->distinct()
        //                 ->select('orders_detail.*','products.name')
        //                 ->take(10)->get();

        return view('admin.dashboard.index',compact('products','users','orders','manufacturers',
                    'categories','comments','ratings','users_recently','orders_recently','products_sale'));
    }
}
