@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Danh sách danh mục- sản phẩm</h2>
    <form action="{{ route('search_category_product') }}" method="GET">
        <div class="form-group d-flex mb-3">
            <input type="text" placeholder="Tìm kiếm theo tên danh mục" name="category" class="form-control w-25">
            <button type="submit" class="btn btn-success ml-4">Tìm kiếm</button>
        </div>
    </form>
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Tên sản phẩm</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($category_product as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->categories->name }}</td>
                    <td>{{ $item->products->name }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('category_product.edit',$item->id) }}" class="btn btn-success btn-sm" role="button">
                            <i class="fa fa-edit mr-1" aria-hidden="true"></i> Thay đổi
                        </a> &nbsp;
                        <form action="{{ route('category_product.destroy',$item->id) }}" method="POST">
                            @method('DELETE') 
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa mục này không ?')">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                            </button>
                        </form>          
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $category_product->links() }}
@endsection