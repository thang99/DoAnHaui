@extends('user.layouts.app')
@section('content')
	@include('user.layouts.__partials.breadcrum',['name' => 'Đăng nhập'])
	<div class="page-content" style="margin: 80px 0px">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-3">
					@if (session('status'))
						<div class="alert alert-danger">
							{{ session('status') }}
						</div>
					@endif
					<form action="{{ route('user.login')}}" method="POST">
						@csrf
						<div class="login-form">
							<h4 class="login-title">Đăng nhập</h4>
							<div class="row">
								<div class="col-md-12 col-12 mb-2">
									<label>Email: </label>
									<input class="mb-0" type="email" name="email" value="{{ old('email') }}">
									@error('email')
										<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
								<div class="col-12 mb-20">
									<label>Mật khẩu:</label>
									<input class="mb-0" type="password" name="password">
									@error('password')
										<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
								<div class="col-md-6">
									<button type="submit" class="register-button btn btn-primary mt-0" style="outline: none">Đăng nhập</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

