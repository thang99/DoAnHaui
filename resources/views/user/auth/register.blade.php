@extends('user.layouts.app')
@section('content')
	@include('user.layouts.__partials.breadcrum',['name' => 'Đăng ký'])
    <div class="page-content" style="margin: 80px 0px" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-3">
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('user.register') }}" method="POST">
                            @csrf
                            <div class="login-form">
                                <h4 class="login-title">Đăng ký</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Họ tên:</label>
                                            <input type="text" class="form-control w-100" value="{{ old('name') }}" id="name" name="name">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="gender1">Giới tính:</label>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" id="gender1" value="0">Nam
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="gender" id="gender2" value="1">Nữ
                                                </label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="birthday">Ngày sinh:</label>
                                            <input type="date" class="form-control w-100" value="{{ old('birthday') }}" id="birthday" name="birthday">
                                            @error('birthday')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>                                     
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">Địa chỉ:</label>
                                            <input type="text" class="form-control w-100" value="{{ old('address') }}" id="address" name="address">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phone">Điện thoại:</label>
                                            <input type="number" class="form-control w-100" value="{{ old('phone') }}" id="phone" name="phone">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email2">Email:</label>
                                            <input type="email" class="form-control w-100" id="email2" value="{{ old('email') }}" name="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password2">Mật khẩu:</label>
                                            <input type="password" class="form-control w-100" id="password2" name="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="confirm__password">Nhập lại mật khẩu:</label>
                                            <input type="password" class="form-control w-100" id="confirm_password" name="confirm_password">
                                            @error('confirm_password')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="register-button btn btn-primary mt-0" style="outline: none">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>     
                </div>
            </div>
        </div>
    </div>
@endsection

