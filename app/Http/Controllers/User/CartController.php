<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCart = Cart::content();

        return view('user.layouts.cart',compact('listCart'));
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
        $product_id =$request->product_id;
        $product = Product::where('id','=',$product_id)->first();
        $data['id'] = $product_id;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = 0;
        $data['options']['image'] = $product->image;
        $data['options']['quantity_max'] = $product->quantity;
        $data['qty'] = 1;
        Cart::add($data);

        return redirect()->route('carts.index');
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
        $rowId = $request->rowId;
        $quantity = $request->quantity;
        Cart::update($rowId,$quantity);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }

    public function getCheckOutCart()
    {
        if (Auth::user() && count(Cart::content()) > 0) {
            $aUser = Auth::user();
            $aCarts = Cart::content();
            $aCartTotal = Cart::subtotal();
            $data = ['aUser' => $aUser, 'aCarts' => $aCarts, 'aCartTotal' => $aCartTotal];
            
            return view('user.layouts.checkout', compact('data'));
        } else {

            return redirect()->route('user.login')->with('status', 'Vui lòng đăng nhập để tiếp tục');
        }
    }

    public function storeOrder(CheckoutRequest $request)
    {
        if (Auth::user()) {
            $idUser = Auth::id();
            $dataOrder = [
                'user_id' => $idUser,
                'quantity' => Cart::count(),
                'total_price' => str_replace(',','',Cart::subtotal()),
                'status' => 0
            ];
            // dd(gettype($dataOrder['total_price']));
            $dataUser = [
                'phone' => $request->phone,
                'address' => $request->address
            ];
            User::where('id','=',$idUser)->update($dataUser);
            $result = Order::create($dataOrder);

            if ($result) {
                $aCartsDetail = Cart::content();
                foreach ($aCartsDetail as $item) {
                    $dataOrderDetail = [
                        'order_id' => $result->id,
                        'product_id' => $item->id,
                        'quantity' => $item->qty,
                        'unit_price' => $item->price
                    ];
                    // dd(gettype($dataOrderDetail['unit_price']));
                    self::storeOrderDetail($dataOrderDetail);
                    Cart::destroy();
                }

                return redirect()->route('user.thankyou');
            }
        } else {

            return redirect()->route('user.login')->with('status', 'Vui lòng đăng nhập để tiếp tục');
        }
    }
    public function storeOrderDetail($data)
    {
        $orderDetail = new OrderDetail();
        $result = $orderDetail->create($data);

        return $result;
    }

    public function getDeleteAllCart()
    {
        Cart::destroy();
        
        return redirect()->back();
    }

    public function updateCart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        Cart::update($prod_id,$quantity);
    }
}
