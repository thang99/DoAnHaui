@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Danh sách slide</h2>
    <form action="{{ route('search_slide') }}" method="GET">
        <div class="form-group d-flex mb-3">
            <input type="text" placeholder="Tìm kiếm theo tên slide" name="slide" class="form-control w-25">
            <button type="submit" class="btn btn-success ml-4">Tìm kiếm</button>
        </div>
    </form>
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Tên slide</th>  
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Link ảnh</th>
                <th>Hành động</th>
            </tr>   
        </thead>    
        <tbody>
            @foreach ($slides as $slide)
                <tr>
                    <td>{{ $slide->id }}</td>
                    <td>{{ $slide->name }}</td>
                    <td>{!! $slide->content !!}</td>
                    <td>
                        <img src="/images/slides/{{ $slide->image }}" alt="" width="50" height="50">
                    </td>
                    <td>{{ $slide->link }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{route('slide.edit',$slide->id)}}" class="btn btn-success btn-sm" role="button">
                            <i class="fa fa-edit mr-1" aria-hidden="true"></i> Thay đổi
                        </a> &nbsp;
                        <form action="{{route('slide.destroy',$slide->id)}}" method="POST" enctype="multipart/form-data">
                            @method('DELETE') 
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa slide này không ?')">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                            </button>
                        </form>
                    </td>          
                </tr>
            @endforeach
        </tbody>
    </table>   
    {{$slides->links()}} 
@endsection