<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with(['user','product'])->paginate(5);

        return view('admin.comment.index',compact('comments'));
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
        //
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('status','Xóa comment thành công');
    }

    public function changeStatus(Request $request)
    {
        $comment_id = $request->comment_id;
        $comment = Comment::findOrFail($comment_id);
        $status_comment = $request->status_comment;
        $comment->status = $status_comment;
        $comment->save();

        // return redirect()->route('comment.index')->with('status','Thay đổi trạng thái comment thành công');
    }

    public function search()
    {
        $search_text = $_GET['comment'];
        $products = Product::where('name','LIKE','%'.$search_text.'%')->get();
        $arr2 = [];
        foreach($products as $product) {
            $arr2[] = $product->id;
        }
        $comments = Comment::with(['user','product'])->whereIn('product_id',$arr2)->paginate(7);

        return view('admin.comment.search',compact('comments'));
    }
}
