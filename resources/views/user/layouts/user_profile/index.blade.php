@extends('user.layouts.app')
@section('content')
    @include('user.layouts.__partials.breadcrum',['name' => 'Thông tin cá nhân của bạn'])
    <div class="main user-info">
        <h3 class="mb-5">Thông tin cá nhân</h3>
        <div class="form-group">
            <label for="">Họ tên:</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>  
        </div> 
        <div class="form-group">
            <label for="gender">Giới tính:</label>
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
            <label for="">Ngày sinh:</label>
            <input type="text" class="form-control" value="{{ $user->birthday }}" readonly>  
        </div>
        <div class="form-group">
            <label for="">Địa chỉ:</label>
            <input type="text" class="form-control" value="{{ $user->address }}" readonly>  
        </div>
        <div class="form-group">
            <label for="">Điện thoại:</label>
            <input type="text" class="form-control" value="{{ $user->phone }}" readonly>  
        </div>
        <div class="form-group">
            <label for="">Email:</label>
            <input type="text" class="form-control" value="{{ $user->email }}" readonly>  
        </div>
    </div>
@endsection