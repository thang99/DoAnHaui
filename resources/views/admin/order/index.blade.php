@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3"> Danh sách đơn đặt hàng </h2>
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Số lượng</th>
                <th>Người mua</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày mua</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ number_format($order->total_price) }} vnđ</td>
                    <td>
                        @if ($order->status == 0)
                        <form method="POST">
                            @csrf
                            <select class="btn btn-primary change-status-order">
                                <option class="btn btn-primary" value="0" data-id="{{ $order->id }}" selected>Đang chờ xử lý</option>
                                <option class="btn btn-success" value="1" data-id="{{ $order->id }}">Đã giao</option>
                                <option class="btn btn-danger" value="-1" data-id="{{ $order->id }}">Bị hủy</option>
                            </select>
                        </form>
                        @elseif ($order->status == -1)
                            <select class="btn btn-danger" disabled>
                                <option class="btn btn-primary">Đang chờ xử lý</option>
                                <option class="btn btn-success">Đã giao</option>
                                <option class="btn btn-danger" selected>Bị hủy</option>
                            </select>
                        @else
                            <select class="btn btn-success" disabled>
                                <option class="btn btn-primary">Đang chờ xử lý</option>
                                <option class="btn btn-success" selected>Đã giao</option>
                                <option class="btn btn-danger">Bị hủy</option>
                            </select> 
                        @endif
                    </td>
                    <td>
                        {{ $order->created_at->format('d-m-Y H:m:s') }}
                    </td>
                    <td>
                        <a href="{{ route('admin.orderdetail',$order->id) }}" class="btn btn-default">Chi tiết đơn hàng</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
@endsection