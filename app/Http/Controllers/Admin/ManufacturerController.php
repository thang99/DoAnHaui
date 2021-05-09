<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::paginate(5);

        return view('admin.manufacturer.index',compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerRequest $request)
    {
        $manufacturer = new Manufacturer;
        $manufacturer->name = $request->input('name');
        $manufacturer->founded_year = $request->input('founded_year');
        $manufacturer->ceo = $request->input('ceo');
        $manufacturer->headquaters = $request->input('headquarters');
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('images/manufacturer',$filename);
            $manufacturer->logo = $filename;
        } else {
            $manufacturer->logo = '';
        }
            $manufacturer->save();

        return redirect()->route('manufacturer.index')->with('status','Thêm mới thành công');
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
        $manufacturer = Manufacturer::findOrFail($id);

        return view('admin.manufacturer.edit',compact('manufacturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerRequest $request, $id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('images/manufacturer',$filename);
        } else {
            $filename = $manufacturer->logo;
        }
        $manufacturer->name = $request->input('name');
        $manufacturer->founded_year = $request->input('founded_year');
        $manufacturer->ceo = $request->input('ceo');
        $manufacturer->headquaters = $request->input('headquarters');
        $manufacturer->logo = $filename;
        
        $manufacturer->save();

        return redirect()->route('manufacturer.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();
        
        return redirect()->route('manufacturer.index')->with('status','Xóa thành công');
    }

    public function search()
    {
        $search_text = $_GET['manufacturer'];

        $manufacturers = Manufacturer::where('name','LIKE','%'.$search_text.'%')->paginate(7);

        return view('admin.manufacturer.search',compact('manufacturers'));
    }
}
