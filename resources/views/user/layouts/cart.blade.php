@extends('user.layouts.app')

@section('content')
    <div class="carts">
        <h3>Thông tin giỏ hàng</h3>
        @if (Cart::total() > 0)
            <table class="table table-bordered text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Gỡ bỏ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listCart as $item)
                        <tr class="cartpage">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img src="{{ asset('/images/products/'.$item->options->image) }}" alt="product image" width="50" height="50">
                            </td>
                            <td>{{ number_format($item->price) }} vnđ</td>
                            <td class="quantity">
                                <div class="pro-qty">
                                    <input type="hidden" class="product_id" value="{{ $item->rowId }}">
                                    <input type="number" class="qty-input" style="width: 60px" value="{{ $item->qty }}">
                                    <button class="btn btn-sm increment-btn changeQuantity">
                                        +
                                    </button>
                                    <button class="btn btn-sm decrement-btn changeQuantity">
                                       -
                                    </button>
                                </div>
                            </td>
                            <td>{{ number_format($item->price * $item->qty) }} vnđ</td>
                            <td>
                                <form action="{{ route('carts.destroy',$item->rowId)}}" method="POST">
                                    @method('DELETE') 
                                    @csrf
                                    <button type="submit" class="btn" onclick="return confirm('Bạn có muốn xóa sản phẩm này ra khỏi giỏ hàng không ?')">
                                        <i class="fa fa-trash mr-1" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="cart-summary">
                <div class="cart-summary-wrap">
                    <h4>Giỏ hàng</h4>
                    <p>Số lượng <span id="totalQuanty">{{ Cart::count() }}</span></p>
                    <p>Tổng tiền <span id="totalPrice">{{ str_replace('.00', '', Cart::subtotal()) }} vnđ</span></p>
                </div>
                <div class="cart-summary-button">
                    <a href="{{ route('user.cart.checkout') }}" class="btn btn-primary">Thanh toán</a>
                    <a href="{{ route('home.index') }}" class="btn btn-success">Mua thêm</a>
                    <a href="{{route('user.delete_all_cart.get')}}" onclick="return confirm('Bạn có chắc muốn xoá hết các sản phẩm không !')" class="btn btn-danger">
                        Xoá giỏ hàng
                    </a>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="page-section section mb-50">
                        <h6 class="alert alert-danger">Giỏ hàng của bạn hiện không có sản phẩm nào !</h6>
                        <a href="{{ route('home.index') }}" class="btn btn-success">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        @endif
        
    </div>
@endsection