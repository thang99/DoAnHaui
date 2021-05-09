@extends('user.layouts.app')

@section('content')
    @include('user.layouts.__partials.breadcrum',['name' => 'Thanh toán'])
    <div class="page-section section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user.order.store') }}" class="checkout-form" method="POST">
                        @csrf
                        <div class="row row-40">
                            <div class="col-lg-6 mb-20">
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">Chỉnh sửa thông tin mua hàng</h4>
                                    <div class="modal-body">
                                        <div class="account-details-form">
                                            <div class="row">
                                                <div class="col-lg-12 col-12 mb-30">
                                                    <label for="">Tên người nhận hàng:</label>
                                                    <input name="name" value="{{$data['aUser']->name}}" type="text">
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 mb-30">
                                                    <label for="">Email người nhận hàng:</label>
                                                    <input name="email" value="{{$data['aUser']->email}}" type="email">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <label for="">Điện thoại người nhận hàng:</label>
                                                    <input name="phone" type="text" value="{{$data['aUser']->phone}}">
                                                    @error('phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 col-12 mb-30">
                                                    <label for="">Địa chỉ người nhận hàng:</label>
                                                    <input type="text" name="address" value="{{$data['aUser']->address}}" >
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-12 mb-60">
                                        <h4 class="checkout-title">Giỏ hàng của bạn</h4>
                                        <div class="checkout-cart-total bg-light">
                                            <h4><span>Sản phẩm</span> <span class="float-right">Giá</span></h4>
                                            @foreach($data['aCarts'] as $item)
                                                <ul class="d-flex">                     
                                                        <li class="w-50">{{ $item->name }} x <span class="text-danger"> {{ $item->qty }}</span></li>
                                                        <li style="margin-left: 100px;">{{ number_format($item->price) }} vnđ</li>
                                                </ul>
                                            @endforeach
                                            <h4 style="border-top:1px solid #999999;padding-top:15px" > <span>Tổng tiền</span>
                                                <span class="float-right">{{ str_replace('.00', '', $data['aCartTotal']) }} vnđ</span></h4>
                                        </div>
                                        <button type="submit" class="place-order">Đặt hàng</button>
                                        <a href="{{ route('carts.index') }}" class="place-order ml-4">Xem giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
