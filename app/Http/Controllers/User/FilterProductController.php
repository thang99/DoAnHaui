<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterProductController extends Controller
{
    public function filterByCategory(Request $request)
    {
        $id = $request->id;
        $product = CategoryProduct::where('category_id','=',$id)->get();
        $arr = [];
        foreach($product as $key=>$item) {
            $arr[$key] = $item->product_id;
        }
        if ($request->price == 'duoi-10-trieu') {
            $products = DB::table('products')->join('category_product','products.id','=','category_product.product_id')
                            ->where('products.status','=',0)->where('category_product.category_id','=',$id)
                            ->where('products.price','<','10000000')
                            ->select('products.*')
                            ->paginate(12);
        } else if ($request->price == 'tu-10-den-15-trieu') {
            $products = DB::table('products')->join('category_product','products.id','=','category_product.product_id')
                            ->where('products.status','=',0)->where('category_product.category_id','=',$id)
                            ->where('products.price','>=','10000000')->where('products.price','<=','15000000')
                            ->select('products.*')
                            ->paginate(12);
        } else if($request->price == 'tu-15-den-20-trieu') {
            $products = DB::table('products')->join('category_product','products.id','=','category_product.product_id')
                        ->where('products.status','=',0)->where('category_product.category_id','=',$id)
                        ->where('products.price','>=','15000000')->where('products.price','<=','20000000')
                        ->select('products.*')
                        ->paginate(12);
        } else if($request->price == 'tren-20-trieu'){
            $products = DB::table('products')->join('category_product','products.id','=','category_product.product_id')
                        ->where('products.status','=',0)->where('category_product.category_id','=',$id)
                        ->where('products.price','>=','20000000')
                        ->select('products.*')
                        ->paginate(12);          
        } else if($request->sort == 'ban-chay-nhat') {
            $products = DB::table('products')
                        ->join('orders_detail','products.id','=','orders_detail.product_id')
                        ->join('category_product','products.id','=','category_product.product_id')
                        ->where('category_product.category_id','=',$id)
                        ->orderByDesc('orders_detail.quantity')
                        ->select('products.*')->paginate(12);
        } else if($request->sort =='gia-tu-thap-den-cao') {
            $products =  DB::table('products')->join('category_product','products.id','=','category_product.product_id')
                        ->where('products.status','=',0)->where('category_product.category_id','=',$id)
                        ->orderBy('products.price','asc')
                        ->select('products.*')
                        ->paginate(12);    
        } else if($request->sort == 'gia-tu-cao-den-thap') {
            $products =  DB::table('products')->join('category_product','products.id','=','category_product.product_id')
                        ->where('products.status','=',0)->where('category_product.category_id','=',$id)
                        ->orderBy('products.price','desc')
                        ->select('products.*')
                        ->paginate(12);
        } else {
            $products = Product::whereIn('id',$arr)->paginate(12);
        }
        $slides = Slide::take(4)->get();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $all_products = Product::all();
        
        return view('user.layouts.filter_category',compact('products','slides','manufacturers','categories','all_products'));
    }

    public function filterByManufacturer(Request $request)
    {
        $id = $request->id;
        if ($request->price == 'duoi-10-trieu') {
            $products = Product::where('status','=',0)->where('manufacturer_id','=',$id)->where('price','<','10000000')->paginate(12);
        } else if ($request->price == 'tu-10-den-15-trieu') {
            $products = Product::where('status','=',0)->where('manufacturer_id','=',$id)->where('price','>=','10000000')->where('price','<=','15000000')->paginate(12);
        } else if($request->price == 'tu-15-den-20-trieu') {
            $products = Product::where('status','=',0)->where('manufacturer_id','=',$id)->where('price','>=','15000000')->where('price','<=','20000000')->paginate(12);
        } else if($request->price == 'tren-20-trieu'){
            $products = Product::where('status','=',0)->where('manufacturer_id','=',$id)->where('price','>=','20000000')->paginate(12);
        } else if($request->sort == 'ban-chay-nhat') {
            $products = DB::table('products')
                        ->join('orders_detail','products.id','=','orders_detail.product_id')
                        ->where('products.manufacturer_id','=',$id)
                        ->orderByDesc('orders_detail.quantity')
                        ->select('products.*')->paginate(12);
        } else if($request->sort =='gia-tu-thap-den-cao') {
            $products = Product::where('status','=',0)->where('manufacturer_id','=',$id)->orderBy('price','asc')->paginate(12); 
        } else if($request->sort == 'gia-tu-cao-den-thap') {
            $products = Product::where('status','=',0)->where('manufacturer_id','=',$id)->orderBy('price','desc')->paginate(12); 
        } else {
            $products = Product::where('manufacturer_id','=',$id)->paginate(12);
        }
        $slides = Slide::take(4)->get();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $all_products = Product::all();
        
        return view('user.layouts.filter_category',compact('products','slides','manufacturers','categories','all_products'));
    }
}
