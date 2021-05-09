@extends('admin.layouts.app')
@section('content')
    <h2 class="pt-3 mb-5">Danh sách người dùng</h2>
    <form action="{{ route('search_user') }}" method="GET">
        <div class="form-group d-flex mb-3">
            <input type="text" placeholder="Tìm kiếm theo email" name="email" class="form-control w-25">
            <button type="submit" class="btn btn-success ml-4">Tìm kiếm</button>
        </div>
    </form>
    <a href="{{route('users.create')}}" class="btn btn-primary mb-3" role="button" style="float:right">
        <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
    </a> 
    @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('status')}}</strong>
        </div>
    @endif
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Quyền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if ($user->gender == 0)
                            Nam
                        @else
                            Nữ
                        @endif
                    </td>
                    <td>{{ $user->birthday }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ Str::limit($user->password,10) }}
                    </td>
                    <td>
                        @if ($user->role == 0)
                            Người quản trị
                        @elseif ($user->role== 1)
                            Nhân viên
                        @else
                            Người dùng
                        @endif                     
                    </td>
                    <td class="d-flex justify-content-center">
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-success btn-sm" role="button">
                            <i class="fa fa-edit mr-1" aria-hidden="true"></i> Cập nhật
                        </a> &nbsp;
                        <form action="{{route('users.destroy', $user->id)}}" method="POST">
                            @method('DELETE') 
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa người này không ?')">
                                <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                            </button>
                        </form>
                    </td>          
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
@endsection