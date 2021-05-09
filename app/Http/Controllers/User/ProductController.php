<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $manufacturerId = $product->manufacturer->id;
        $products = Product::where('manufacturer_id','=',$manufacturerId)->where('id','!=',$id)->take(4)->get();
        $comments = Comment::with(['user','product'])->where('product_id','=',$id)->where('status','=',1)->orderBy('created_at','desc')->paginate(5);
        $feedbacks = Feedback::with('senders')->where('product_id','=',$id)->where('status','=',1)->get();
        $ratings = Rating::where('product_id','=',$id)->get();

        return view('user.layouts.product_detail',compact('product','products','comments','ratings','feedbacks'));
    }

    public function postComment(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->back()->with('alter','Bạn cần đăng nhập để comment');
        } else {
            $data = [
                'content' => $request->comment_content,
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'status' => 1
            ];

            $comment = Comment::create($data);
            $comment->save();

            return redirect()->back();
        }
    }

    public function postFeedback(Request $request)
    {
        $comment = Comment::where('product_id','=',$request->product_id)->first();
        $user_id = $comment->user_id;
        if(!Auth::check()) {
            return redirect()->back()->with('alter','Bạn cần đăng nhập để trả lời');
        } else {
            $data = [
                'content' => $request->feedback_content,
                'sender' => Auth::id(),
                'product_id' => $request->product_id,
                'user_id' => $user_id,
                'status' => 1
            ];

            $feedback = Feedback::create($data);
            $feedback->save();

            return redirect()->back();
        }

    }

    public function postRating(Request $request)
    {
        $user_id = $request->user_id;
        $star_quantity = $request->star_quantity;
        $product_id = $request->product_id;

        $ratings = Rating::where('user_id','=',$user_id)->where('product_id','=',$product_id)->count();
        $output = '';
        if($request->user_id == "") {
            $output .= '<div class="alert alert-danger mt-3">
                            <p>Bạn cần đăng nhập để có thể đánh giá sản phẩm này</p>
                        </div>';
        } else if($ratings > 0) {
            $rating = Rating::where('user_id','=',$user_id)->where('product_id','=',$product_id)->first();
            $rating->evaluate = $star_quantity;
            $rating->save();
            $output .= '<div class="alert alert-success mt-3">
                            <p>Cập nhật đánh giá thành công</p>
                        </div>';
        } else {
            $rating = new Rating();
            $rating->user_id = $user_id ;
            $rating->evaluate = $star_quantity;
            $rating->product_id = $product_id;
            $rating->save();
            $output .= '<div class="alert alert-success mt-3">
                            <p>Cảm ơn bạn đã đánh giá</p>
                        </div>';
        }

        echo $output;
    }
}
