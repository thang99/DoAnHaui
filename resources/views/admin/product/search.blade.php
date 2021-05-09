@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3"> Danh sách sản phẩm </h2>
    <form action="{{ route('search_product') }}" method="GET">
        <div class="form-group d-flex mb-3">
            <input type="text" placeholder="Tìm kiếm theo tên sản phẩm" name="product" class="form-control w-25">
            <button type="submit" class="btn btn-success ml-4">Tìm kiếm</button>
        </div>
    </form>
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>RAM</th>
                <th>CPU</th>
                <th>Ổ cứng</th>
                <th>Màn hình</th>
                <th>Kích thước</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Hệ điều hành</th>
                <th>Năm ra mắt</th>
                <th>Mô tả</th>
                <th>Hãng sản xuất</th>
                <th>Xuất xứ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        @if ($products->count()> 0)
            <tbody>         
                @foreach ($products as $product)      
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->ram }}</td>
                        <td>{{ $product->cpu }}</td>
                        <td>{{ $product->hard_drive }}</td>
                        <td>{{ $product->screen }}</td>
                        <td>{{ $product->size }}</td>
                        <td>
                            <img src="/images/products/{{ $product->image }}" alt="" width="50" height="50"> 
                        </td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->operator_system }}</td>
                        <td>{{ $product->year_of_launch }}</td>
                        <td>
                            {{ Str::limit($product->description,10) }}
                        </td>
                        <td>{{ $product->manufacturer->name }}</td>
                        <td>{{ $product->origin }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-success btn-sm" role="button">
                                <i class="fa fa-edit mr-1" aria-hidden="true"></i> Thay đổi
                            </a> &nbsp;
                            <form action="{{ route('product.destroy',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @method('DELETE') 
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">
                                    <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                                </button>
                            </form>
                        </td>   
                    </tr>              
                @endforeach 
            </tbody>
        @else
            <tbody>
                <tr>
                    <td colspan="17">
                        <div class="text-danger text-bold">Không tìm thấy sản phẩm nào</div> 
                    </td>
                </tr>
            </tbody>
        @endif
    </table>
    {{$products->links()}}
@endsection