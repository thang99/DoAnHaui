<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_product = CategoryProduct::paginate(7);

        return view('admin.category_product.index',compact('category_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = Category::all();
        $products = Product::all();

        return view('admin.category_product.create',compact('categories','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category_id = $request->category;
        $product_id = $request->product;
        $data = [
            'category_id' => $category_id,
            'product_id' => $product_id
        ];
        
        $count = CategoryProduct::where('category_id','=',$category_id)->where('product_id','=',$product_id)->count();
        if( $count > 0 ) {
            return redirect()->back()->with('status','Đã tồn tại danh mục sản phẩm này');
        } else {
            CategoryProduct::create($data);

            return redirect()->route('category_product.index')->with('status','Thêm mới thành công');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_product = CategoryProduct::findOrFail($id);
        $categories = Category::all();
        $products = Product::all();

        return view('admin.category_product.edit',compact('category_product','categories','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_product = CategoryProduct::findOrFail($id);
        $category_id = $request->category;
        $product_id = $request->product;
        $count = CategoryProduct::where('category_id','=',$category_id)->where('product_id','=',$product_id)->count();

        if( $count > 0 ) {
            return redirect()->back()->with('status','Đã tồn tại danh mục sản phẩm này');
        } else {         
            $category_product->category_id = $category_id;
            $category_product->product_id = $product_id;
            $category_product->save();

            return redirect()->route('category_product.index')->with('status','Cập nhật thành công');
        }   


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_product = CategoryProduct::findOrFail($id);
        $category_product->delete();

        return redirect()->route('category_product.index')->with('status','Xóa thành công');
    }

    public function search()
    {
        $search_text = $_GET['category'];

        $categories = Category::where('name','LIKE','%'.$search_text.'%')->get();
        $arr = [];
        foreach($categories as $category) {
            $arr[] = $category->id;
        }

        $category_product = CategoryProduct::with(['categories','products'])->whereIn('category_id',$arr)->paginate(7);

        return view('admin.category_product.search',compact('category_product'));
    }
}
