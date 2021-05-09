<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(7);   

        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();

        return view('admin.product.create',compact('manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->ram = $request->input('ram');
        $product->cpu = $request->input('cpu');
        $product->hard_drive = $request->input('hard_drive');
        $product->screen = $request->input('screen');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->operator_system = $request->input('operator_system');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('images/products',$filename);
            $product->image = $filename;
        } else {
            $product->image = '';
        }
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->quantity = $request->input('quantity');
        $product->origin = $request->input('origin');
        $product->year_of_launch = $request->input('year');
        $product->manufacturer_id = $request->input('manufacturer');
        $product->save();

        return redirect()->route('product.index')->with('status','Thêm mới thành công');
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
        $product = Product::findOrFail($id);
        $manufacturers = Manufacturer::all();

        return view('admin.product.edit',compact('product','manufacturers'));
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
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->ram = $request->input('ram');
        $product->cpu = $request->input('cpu');
        $product->hard_drive = $request->input('hard_drive');
        $product->screen = $request->input('screen');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->operator_system = $request->input('operator_system');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('images/products',$filename);
        } else {
            $filename= $product->image;
        }
        $product->image = $filename;
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->quantity = $request->input('quantity');
        $product->origin = $request->input('origin');
        $product->year_of_launch = $request->input('year');
        $product->manufacturer_id = $request->input('manufacturer');
        $product->save();

        return redirect()->route('product.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('list__product')->with('status','Xóa thành công');
    }

    public function search()
    {
        $search_text = $_GET['product'];

        $products = Product::where('name','LIKE','%'.$search_text.'%')->paginate(7);

        return view('admin.product.search',compact('products'));
    }
}
