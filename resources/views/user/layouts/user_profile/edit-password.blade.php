<h2 class="mb-5">Thay đổi mật khẩu</h2>
@if (session('alert'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div>{{ session('alert') }}</div>
    </div>
@endif
<form action="{{route('user.password',$user->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="">Mật khẩu hiện tại:</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
        @error('password')
            <span class="text-danger">{{ $message }}</span> 
        @enderror
    </div>
    <div class="form-group">
        <label for="">Mật khẩu mới:</label>
        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}">
        @error('new_password')
        <span class="text-danger">{{ $message }}</span> 
      @enderror
    </div>
    <div class="form-group">
        <label for="">Nhập lại mật khẩu mới:</label>
        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="{{ old('confirm_password') }}">
        @error('confirm_password')
            <span class="text-danger">{{ $message }}</span> 
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
