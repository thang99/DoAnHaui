<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::paginate(5);
        
        return view('admin.slide.index',compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $slide = new Slide;
        $slide->name = $request->input('name');
        $slide->content = $request->input('content');
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/slides',$filename);
            $slide->image = $filename;
        } else {
            $slide->image = '';
        }
        $slide->link = $request->input('link');
        $slide->save();

        return redirect()->route('slide.index')->with('status','Thêm mới thành công');
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
        $slide = Slide::findOrFail($id);
        return view('admin.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, $id)
    {
        $slide = Slide::findOrFail($id);
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/slides',$filename);
        } else {
            $filename = $slide->image;
        }
        $slide->name = $request->input('name');
        $slide->content = $request->input('content');
        $slide->image = $filename;
        $slide->link = $request->input('link');
        $slide->save();

        return redirect()->route('slide.index')->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();

        return redirect()->route('slide.index')->with('status','Xóa thành công');
    }

    public function search()
    {
        $search_text = $_GET['slide'];

        $slides = Slide::where('name','LIKE','%'.$search_text.'%')->paginate(7);

        return view('admin.slide.search',compact('slides'));
    }
}
