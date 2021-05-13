@extends('user.layouts.app')
@section('content')
<div class="bg-light main mt-5">
    <h3 class="mb-3 pt-5">Danh sách đơn hàng</h3>
    <div class="text-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày mua</th>
                    <th colspan="2">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @if (count($orders) > 0)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ number_format($order->total_price) }} vnđ</td>
                            <td> 
                                @if($order->status == 0)
                                    <a href="#" class="btn btn-primary">Đang chờ xử lý</a>
                                @elseif($order->status == 1)
                                    <a href="#" class="btn btn-success">Đã giao hàng</a>
                                @else
                                    <a href="#" class="btn btn-danger">Đã hủy</a>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d-m-Y H:m:s') }}</td>
                            <td data-toggle="collapse" href="#collapseExample{{ $order->id }}" aria-expanded="false" aria-controls="collapseExample" >
                                <a class="btn btn-secondary text-white" role="button">Chi tiết đơn hàng</a> 
                            </td>
                            <td>
                                @if ($order->status == 0)
                                    <button data-id="{{ $order->id }}"
                                            class="btn btn-danger ml-2 userDel">Hủy đơn hàng
                                    </button>
                                @endif
                            </td>
                        </tr>
                        <tr class="collapse" id="collapseExample{{ $order->id }}">
                            <td colspan="7">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderDetails as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ number_format($item->unit_price) }} vnđ</td>
                                                <td>{{ number_format($item->quantity * $item->unit_price) }} vnđ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                @else
                   <tr>
                       <td colspan="7">
                           <div class="p-3 bg-danger text-white">Không tìm thấy sản phẩm nào</div>
                       </td>
                   </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection