@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Chi tiết của hoá đơn : #{{ $data['order_id']}}</h2>
    <table id="example1" class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Số lượng </th>
            <th scope="col">Giá</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data['aOrderDetail'] as $order_detail)
                <tr>
                    <th scope="row">{{ $order_detail->id }}</th>
                    <td> {{ $order_detail->product_name }}</td>
                    <td> {{ $order_detail->quantity }}</td>
                    <td> {{ number_format($order_detail->unit_price) }} vnđ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


