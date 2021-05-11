@extends('admin.layouts.app')
@section('content')
    <div class="main user-info">
        <div class="row">
            <div class="col-6 border-right">
                <h2 class="mb-5 pt-3">Thay đổi thông tin cá nhân</h2>
                <div class="tab-content">
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
                            <label for="">Họ tên:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror w-100" value="{{$user->name}}" name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Giới tính:</label>
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
                            @error('gender')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="">Ngày sinh:</label>
                            <input type="date" class="form-control w-100" value="{{$user->birthday}}" name="birthday">
                            @error('birthday')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="">Địa chỉ:</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror w-100" value="{{$user->address}}" name="address">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="">Điện thoại:</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror w-100" value="{{$user->phone}}" name="phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror w-100" value="{{$user->email}}" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span> 
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
            <div class="col-6 pl-5 pt-3">
                @include('user.layouts.user_profile.edit-password')
            </div>
        </div>
    </div>
@endsection