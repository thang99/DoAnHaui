<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @include('user.layouts.__partials.style')
    <title>Laptop Hùng Linh</title>
</head>
<body>
    <div class="contain">
      	@include('user.layouts.__partials.header')
		<div class="container-fluid">
			@yield('content')
		</div>
      	@include('user.layouts.__partials.footer')
    </div>
    @include('user.layouts.__partials.script')
</body>
</html>