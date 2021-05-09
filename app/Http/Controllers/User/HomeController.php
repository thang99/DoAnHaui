<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $slides = Slide::take(4)->get();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $all_products = Product::all();
        if ($request->price == 'duoi-10-trieu') {
            $products = Product::where('status','=',0)->where('price','<','10000000')->paginate(12);
        } else if ($request->price == 'tu-10-den-15-trieu') {
            $products = Product::where('status','=',0)->where('price','>=','10000000')->where('price','<=','15000000')->paginate(12);
        } else if($request->price == 'tu-15-den-20-trieu') {
            $products = Product::where('status','=',0)->where('price','>=','15000000')->where('price','<=','20000000')->paginate(12);
        } else if($request->price == 'tren-20-trieu'){
            $products = Product::where('status','=',0)->where('price','>=','20000000')->paginate(12);
        } else if($request->sort == 'ban-chay-nhat') {
            $products = DB::table('products')
                        ->join('orders_detail','products.id','=','orders_detail.product_id')
                        ->orderByDesc('orders_detail.quantity')
                        ->select('products.*')->paginate(12);
        } else if($request->sort == 'gia-tu-thap-den-cao') {
            $products = Product::where('status','=',0)->orderBy('price','asc')->paginate(12); 
        } else if($request->sort == 'gia-tu-cao-den-thap') {
            $products = Product::where('status','=',0)->orderBy('price','desc')->paginate(12); 
        } else {
            $products = Product::paginate(12);
        }

        return view('user.layouts.home',compact('slides','categories','manufacturers','products','all_products'));
    }

    public function search(Request $request)
    {
        $slides = Slide::take(4)->get();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $all_products = Product::all();
        $data = $request->product_search;
        $products = Product::where('name','LIKE','%'.$data.'%')->paginate(12);

        return view('user.layouts.home',compact('slides','categories','manufacturers','products','all_products'));
    }
}
