<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link">
      <img src="{{asset('dist/img/laptop.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: 0.8">
      <span class="brand-text font-weight-light text-primary">Hung Linh Computer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">{{Auth::user()->name}}</a> --}}
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('manufacturer.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý hãng sản xuất
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý danh mục
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="fab fa-product-hunt mr-2"></i>
              <p>
                Quản lý sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('slide.index')}}" class="nav-link">
              <i class="fas fa-sliders-h mr-2"></i>
              <p>
                Quản lý slide
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('comment.index')}}" class="nav-link">
              <i class="far fa-comments mr-2"></i>
              <p>
                Quản lý bình luận
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('feedback.index')}}" class="nav-link">
              <i class="far fa-comments mr-2"></i>
              <p>
                Quản lý phản hồi bình luận
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="fa fa-users mr-2" aria-hidden="true"></i>
              <p>
                Quản lý người dùng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('order.index')}}" class="nav-link">
              <i class="fas fa-truck-moving mr-2"></i>
              <p>
                Quản lý đơn đặt hàng
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('category_product.index')}}" class="nav-link">
              <i class="fab fa-first-order-alt mr-2"></i>
              <p>
                Quản lý danh mục-sản phẩm
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>