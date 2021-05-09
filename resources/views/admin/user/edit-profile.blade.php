@extends('admin.layouts.app')
@section('content')
  <div class="row">
    <div class="col-6 border-right">
        <h2 class="mb-3 pt-3">Thay đổi thông tin người dùng</h2>
        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div>{{ session('status') }}</div>
            </div>
        @endif
        <form action="{{ route('users.profile',$user->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <span for="id">ID:</span>
                <input type="text" class="form-control" id="id" name="id" readonly value="<?= $user->id ?>">
            </div>
            <div class="form-group">
                <span for="name">Họ tên:</span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="<?= $user->name ?>">
                @error('name')
                <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <div class="form-group">
                <span for="gender">Giới tính:</span>
                @if ($user->gender == 0)
                    <div class="form-check-inline">
                        <span class="form-check-span">
                        <input type="radio" class="form-check-input" id="gender" name="gender" value="0" checked>Nam
                        </span>
                    </div>
                    <div class="form-check-inline">
                        <span class="form-check-span">
                        <input type="radio" class="form-check-input" id="gender" name="gender" value="1">Nữ
                        </span>
                    </div>
                @else
                    <div class="form-check-inline">
                        <span class="form-check-span">
                        <input type="radio" class="form-check-input" id="gender" name="gender" value="0">Nam
                        </span>
                    </div>
                    <div class="form-check-inline">
                        <span class="form-check-span">
                        <input type="radio" class="form-check-input" id="gender" name="gender" value="1" checked>Nữ
                        </span>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <span for="birthday">Ngày sinh:</span>
                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="<?= $user->birthday ?>">
                @error('birthday')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <div class="form-group">
                <span for="address">Địa chỉ:</span>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="<?= $user->address ?>">
                @error('address')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <div class="form-group">
                <span for="phone">Điện thoại:</span>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="phone" value="<?= $user->phone ?>">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <div class="form-group">
                <span for="email">Email:</span>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="<?= $user->email ?>">
                    @error('email')
                <span class="text-danger">{{ $message }}</span> 
                @enderror
            </div>
            <div class="form-group">
                <span for="name">Quyền:</span>
                @if ($user->role == 0) 
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" name="role" value="0" checked>Người quản trị
                    </span>
                    </div>
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="1" name="role">Nhân viên
                    </span>
                    </div>
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="2" name="role">Người dùng
                    </span>
                    </div> 
                @elseif ($user->role == 1)
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="0" name="role">Người quản trị
                    </span>
                    </div>
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="1" name="role" checked>Nhân viên
                    </span>
                    </div>
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="2" name="role">Người dùng
                    </span>
                    </div> 
                @else 
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="0" name="role">Người quản trị
                    </span>
                    </div>
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="1" name="role">Nhân viên
                    </span>
                    </div>
                    <div class="form-check-inline">
                    <span class="form-check-span">
                        <input type="radio" class="form-check-input" value="2" name="role" checked>Người dùng
                    </span>
                    </div> 
                @endif     
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <button type="button" class="btn btn-secondary" onclick="window.location='{{route('users.index')}}'">Quay lại</button>
        </form> 
    </div>
    <div class="col-6">
        @include('admin.user.edit-password')
    </div>
  </div>
@endsection

