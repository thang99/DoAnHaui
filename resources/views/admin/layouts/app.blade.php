
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('admin.layouts.__partials.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-5">
		@if (Auth::check())
            <div class="login" style="margin-right: 55px">
                <div class="dropdown show">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/user.png')}}" alt="" width="25" height="25"><i class="fas fa-caret-down ml-1"></i>
                    </a>    
                    <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink" style="margin-right: -60px">
                        <a class="dropdown-item" href="{{route('user.show',Auth::id())}}"><i class="fas fa-user mr-2"></i>{{Auth::user()->name}}</a>
                        <a class="dropdown-item" href="{{route('user.edit',Auth::id())}}"><i class="fas fa-user-cog mr-2"></i>Cài đặt</a>
                        <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất</a>
                    </div>
                </div>
            </div>
        @endif
    </ul>
  </nav>
  @include('admin.layouts.__partials.aside')
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>
    @include('admin.layouts.__partials.footer')
</div>
@include('admin.layouts.__partials.script')
</body>
</html>
