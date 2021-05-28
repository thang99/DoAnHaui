<div class="d-flex justify-content-md-around align-items-center mb-2 header">
    @if (Auth::check())
        <div class="logo" style="margin-left: 33px">
            <a href="{{ route('home.index') }}">
                <img src="{{asset('dist/img/laptop.jpg')}}" alt="logo" width="40" height="30">
                <span class="text-white">Hùng Linh Computer</span>
            </a>
        </div>
    @else
        <div class="logo" style="margin-left: 68px">
            <a href="{{ route('home.index') }}">
                <img src="{{asset('dist/img/laptop.jpg')}}" alt="logo" width="40" height="30">
                <span class="text-white">Hùng Linh Computer</span>
            </a>
        </div>
    @endif
    <div class="search">
        <form method="POST" action="/search">
            @csrf
            <input type="text" name="product_search" placeholder="Nhập sản phẩm bạn muốn tìm ..."/>
            <button type="submit" class="btn btn-secondary button-search"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="info">
        @if (Auth::check())
            <div class="login d-flex align-items-center" style="margin-right: 20px">
                <div class="dropdown show">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/user.png')}}" alt="" width="30" height="30">
                    </a>    
                    <div class="dropdown-menu mr-5 mt-2" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('user.show',Auth::id()) }}"><i class="fas fa-user mr-2"></i>{{Auth::user()->name}}</a>
                        <a class="dropdown-item" href="{{ route('user.edit',Auth::id()) }}"><i class="fas fa-user-cog mr-2"></i>Cài đặt</a>
                        <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất</a>
                        {{-- <a class="dropdown-item" href="#"><i class="fas fa-cart-plus mr-2"></i>Giỏ hàng</a> --}}
                        <a class="dropdown-item" href="{{ route('user.my_order') }}"><i class="fas fa-cart-arrow-down mr-2"></i>Quản lý đơn hàng</a>
                    </div>
                </div>
                <a class="nav-link text-light" href="{{ route('carts.index') }}">
                    <i class="fas fa-shopping-cart mr-1"><small style="margin-right: 8px">{{Cart::count()}}</small></i>Giỏ hàng
                </a>
            </div>
        @else
            <div class="no-login" style="margin-right: 55px">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('user.login') }}">
                            {{-- <i class="fas fa-sign-in-alt mr-1"></i>--}}Đăng nhập | 
                        </a>
                    </li>
                    <li class="nav-item" style="margin-left: -25px">
                        <a class="nav-link text-light" href="{{ route('user.register') }}">
                            {{-- <i class="fas fa-registered mr-1"></i>--}}Đăng ký 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('carts.index') }}">
                            <i class="fas fa-shopping-cart mr-1"><small style="margin-right: 8px">{{Cart::count()}}</small></i>Giỏ hàng
                        </a>
                    </li>
                </ul> 
            </div>
        @endif
    </div>
</div>