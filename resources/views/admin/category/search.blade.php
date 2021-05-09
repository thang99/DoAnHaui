@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Danh sách danh mục</h2>
    <form action="{{ route('search_category') }}" method="GET">
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
            <th>Hình ảnh</th>
            <th>Nội dung</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                   <img src="{{ asset('/images/categories/'.$category->image) }}" alt="categories" width="50" height="50"> 
                </td>
                <td>{!!$category->content !!}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa fa-edit mr-1" aria-hidden="true"></i> Thay đổi
                    </a> &nbsp;
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('DELETE') 
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa danh mục này không ?')">
                            <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                        </button>
                    </form>          
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@endsection