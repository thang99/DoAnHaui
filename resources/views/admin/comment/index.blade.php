@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Danh sách bình luận</h2>
    <form action="{{ route('search_comment') }}" method="GET">
        <div class="form-group d-flex mb-3">
            <input type="text" placeholder="Tìm kiếm theo tên khách hàng hoặc tên sản phẩm" name="comment" class="form-control w-25">
            <button type="submit" class="btn btn-success ml-4">Tìm kiếm</button>
        </div>
    </form>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('status') }}</strong>
        </div>
    @endif
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Tên sản phẩm</th>
                <th>Nội dung</th>
                <th>Status</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->product->name }}</td>
                <td>{{ $comment->content }}</td>
                @if ($comment->status == 1)
                    <td>
                        <form action="/change-status" method="POST">
                            @csrf
                            <select name="status_comment" class="btn btn-success btn-sm status-comment">
                                <option class="btn btn-success btn-sm" value="1" data-id="{{ $comment->id }}" selected>Hiện</option>
                                <option class="btn btn-primary btn-sm" value="0" data-id="{{ $comment->id }}">Ẩn</option>
                            </select>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="/change-status" method="POST">
                            <select name="status_comment" class="btn btn-primary btn-sm status-comment">
                                <option class="btn btn-success btn-sm" value="1" data-id="{{ $comment->id }}">Hiện</option>
                                <option class="btn btn-primary btn-sm" value="0" data-id="{{ $comment->id }}" selected>Ẩn</option>
                            </select>
                        </form>
                    </td>
                @endif
                <td class="d-flex justify-content-center">
                    <form action="{{route('comment.destroy',$comment->id)}}" method="POST">
                        @method('DELETE') 
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa comment này không ?')">
                            <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                        </button>
                    </form>          
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
    {{$comments->links()}}
@endsection