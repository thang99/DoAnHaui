@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Danh sách phản hồi bình luận</h2>
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
                <th>Tên người phản hồi</th>
                <th>Tên người nhận phản hồi</th>
                <th>Tên sản phẩm</th>
                <th>Nội dung</th>
                <th>Status</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->senders[0]->name }}</td>
                <td>{{ $feedback->user->name }}</td>
                <td>{{ $feedback->product->name }}</td>
                <td>{{ $feedback->content }}</td>
                @if ($feedback->status == 1)
                    <td>
                        <form action="/change-status-feedback" method="POST">
                            @csrf
                            <select name="status_feedback" class="btn btn-success btn-sm status-feedback">
                                <option class="btn btn-success btn-sm" value="1" data-id="{{ $feedback->id }}" selected>Hiện</option>
                                <option class="btn btn-primary btn-sm" value="0" data-id="{{ $feedback->id }}">Ẩn</option>
                            </select>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="/change-status" method="POST">
                            <select name="status_feedback" class="btn btn-primary btn-sm status-feedback">
                                <option class="btn btn-success btn-sm" value="1" data-id="{{ $feedback->id }}">Hiện</option>
                                <option class="btn btn-primary btn-sm" value="0" data-id="{{ $feedback->id }}" selected>Ẩn</option>
                            </select>
                        </form>
                    </td>
                @endif
                <td class="d-flex justify-content-center">
                    <form action="{{route('feedback.destroy',$feedback->id)}}" method="POST">
                        @method('DELETE') 
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa feedback này không ?')">
                            <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                        </button>
                    </form>          
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
    {{$feedbacks->links()}}
@endsection