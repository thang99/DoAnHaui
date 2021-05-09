@extends('user.layouts.app')
@section('content')
    @include('user.layouts.__partials.breadcrum',['name' => 'Cảm ơn'])
    <div class="container">
        <div class="text-center p-3">
            <h1>Cảm ơn quý khách đã mua hàng</h1>
            <p>
                <a href="{{route('home.index')}}" class="btn btn-primary">Trang chủ</a>
                <a href="{{route('home.index')}}" class="btn btn-success">Mua sản phẩm mới</a>
            </p>
        </div>
    </div>
@endsection
