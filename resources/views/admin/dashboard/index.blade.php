@extends('admin.layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-default-primary">
            {{ session('status') }}
        </div>
    @endif
    <h2 class="mb-5 pt-3"> Dashboard</h2>
        <ul class="row stats clearfix">
            <li class="col-3">
                <div class="blue-bg">
                    <i class="fas fa-users"></i>
                    <h5>{{ count($users) }} người dùng</h5>
                    <a href="{{ route('users.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
            <li class="col-3">
                <div class="mehroon-bg">
                    <i class="fab fa-product-hunt"></i>
                    <h5>{{ count($products) }} sản phẩm</h5>
                    <a href="{{ route('product.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
            <li class="col-3">
                <div class="green-bg">
                    <i class="fas fa-industry"></i>
                    <h5>{{ count($manufacturers) }} hãng sản xuất</h5>
                    <a href="{{ route('manufacturer.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
            <li class="col-3">
                <div class="yellow-bg">
                    <i class="fas fa-copy"></i>
                    <h5>{{ count($categories) }} danh mục</h5>
                    <a href="{{ route('category.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
        </ul>
        <ul class="row stats clearfix">
            <li class="col-3">
                <div class="mehroon-bg">
                    <i class="fas fa-comments"></i>
                    <h5>{{ count($comments) }} bình luận</h5>
                    <a href="{{ route('comment.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
            <li class="col-3">
                <div class="yellow-bg">
                    <i class="fas fa-industry"></i>
                    <h5>{{ count($ratings) }} lượt đánh giá</h5>
                    <a href="#">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
            <li class="col-3">
                <div class="blue-bg">
                    <i class="fab fa-first-order-alt"></i>
                    <h5>{{ count($orders) }} đơn hàng</h5>
                    <a href="{{ route('order.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
            <li class="col-3">
                <div class="green-bg">
                    <i class="fas fa-dollar-sign"></i>
                    @php
                        $sum = 0;
                    @endphp
                    @foreach ($orders as $order)
                        @php
                            $sum+= $order->total_price    
                        @endphp
                    @endforeach
                    <h5>{{ number_format($sum) }} vnđ</h5>
                    <a href="{{ route('order.index') }}">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </li>
        </ul>
        <div class="row mt-5">
            <div class="col-6">
                <h4 class="mb-4">Danh sách khách hàng mới nhất</h4>
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Id</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                    </thead>
                    @foreach ($users_recently as $item)
                        <tbody>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->birthday }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col-6">
                <h4 class="mb-4">Danh sách đặt hàng gần đây</h4>
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Id</th>
                        <th>Người đặt hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Tổng tiền</th>
                    </thead>
                    @foreach ($orders_recently as $item)
                        <tbody>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <a class="btn btn-primary">Đang chờ xử lý</a>
                                @elseif ($item->status == -1)
                                    <a class="btn btn-danger">Bị hủy</a>
                                @else
                                    <a class="btn btn-success">Đã giao</a>
                                @endif
                            </td>
                            <td>{{ number_format($item->total_price) }} vnđ</td>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <h4 class="mb-4">Danh sách sản phẩm bán chạy nhất</h4>
            <table class="table table-bordered text-center">
                <thead>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                </thead>
                @foreach ($products_sale as $item)
                    <tbody>
                        <td>{{ $item->product_id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->product_qty }}</td>
                    </tbody>
                @endforeach
            </table>
        </div>
@endsection