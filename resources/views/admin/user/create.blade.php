@extends('admin.layouts.app')
@section('content') 
    <h2 class="mb-3 pt-3">Thêm mới người dùng</h2>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <span for="name">Họ tên:</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
        <span for="gender">Giới tính:</span>
        <div class="form-check-inline">
            <span class="form-check-span">
                <input type="radio" class="form-check-input" id="gender" name="gender" value="0" checked>Nam
            </span>
        </div>
        <div class="form-check-inline">
            <span class="form-check-span">
                <input type="radio" class="form-check-input" id="gender" name="gender" value="1">NỮ
            </span>
        </div>
    </div>
        <div class="form-group">
            <span for="birthday">Ngày sinh:</span>
            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
            @error('birthday')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="address">Địa chỉ:</span>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="phone">Điện thoại:</span>
            <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="phone" value="{{ old('telephone') }}">
            @error('phone')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="email">Email:</span>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="password">Mật khẩu:</span>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
            @error('password')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="confirm__password">Nhập lại mật khẩu:</span>
            <input type="password" class="form-control @error('confirm__password') is-invalid @enderror" id="confirm__password" name="confirm__password" value="{{ old('confirm__password') }}">
            @error('confirm__password')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="name">Quyền:</span>
            <div class="form-check-inline ml-3">
                <span class="form-check-span">
                    <input type="radio" class="form-check-input" name="role" value="0" checked>Người quản trị
                </span>
            </div>
            <div class="form-check-inline">
                <span class="form-check-span">
                    <input type="radio" class="form-check-input" name="role" value="1">Nhân viên
                </span>
            </div>
            <div class="form-check-inline">
                <span class="form-check-span">
                    <input type="radio" class="form-check-input" name="role" value="2">Người dùng
                </span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('users.index') }}'">Quay lại</button>
    </form>
@endsection
