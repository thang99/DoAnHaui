@extends('user.layouts.app')

@section('content')
  @include('user.layouts.__partials.slide')
  <div class="row main mt-5">
			{{-- total products && manufacturers --}}
		<div class="col-12 bg-white mb-4">
			<span style="font-size: 30px;font-weight: 600">Laptop </span><span>({{ $all_products->count() }} sản phẩm)</span>
			<hr>
			<div class="swiper-container mySwiper">
				<div class="swiper-wrapper">
					@foreach ($manufacturers as $manufacturer)
						<div class="swiper-slide">
							<a href="/manufacturer/{{ $manufacturer->id }}" class="manufacturers">
								<img src="{{ asset('/images/manufacturer/'.$manufacturer->logo) }}" alt="logo manufacturer" width="100px" height="50px">
							</a>
						</div>		
					@endforeach
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<div class="mt-3"></div>
		</div>
		
      	{{-- categories --}}
		<div class="col-12 bg-white p-3">
			<h6 class="text-uppercase mb-3">Laptop theo nhu cầu</h6>
			<div class="d-flex justify-content-between flex-fill">
				@foreach ($categories as $category)
					<div class="category p-4 text-center">
						<a href="/category/{{ $category->id }}"><img src="{{ asset('/images/categories/'.$category->image) }}" alt="logo category" class="category-logo"></a>
						<h6 class="mt-3"><a href="/category/{{ $category->id }}">{{ $category->name }}</a></h6>
					</div>
				@endforeach
			</div>
		</div>
		@if (count($products)>0)
			{{-- products --}}
		<div class="col-12 bg-white p-3 mt-4">
			<div class="row mb-3 mt-3">
				<span class="ml-3">Chọn mức giá: </span>
				<a href="{{ URL::current()."?price=duoi-10-trieu" }}" class="filter-price">Dưới 10 triệu</a>
				<a href="{{ URL::current()."?price=tu-10-den-15-trieu" }}" class="filter-price">Từ 10-15 triệu</a>
				<a href="{{ URL::current()."?price=tu-15-den-20-trieu" }}" class="filter-price">Từ 15-20 triệu</a>
				<a href="{{ URL::current()."?price=tren-20-trieu" }}" class="filter-price">Trên 20 triệu</a>
			</div>
			<div class="row mb-3 mt-3">
				<span class="ml-3">Ưu tiên xem: </span>
				<a href="{{ URL::current()."?sort=ban-chay-nhat" }}" class="sort">Bán chạy nhất</a>
				<a href="{{ URL::current()."?sort=gia-tu-thap-den-cao" }}" class="sort">Giá từ thấp tới cao</a>
				<a href="{{ URL::current()."?sort=gia-tu-cao-den-thap" }}" class="sort">Giá từ cao tới thấp</a>
			</div>
			<div class="row">
				@foreach ($products as $product)
					<div class="col-3 mb-4">
						<div class="card-deck h-100">
							<div class="card">
								<a href="/product/{{$product->id}}">
									<img class="card-img-top" src="{{asset('images/products/'.$product->image)}}" alt="product images">
								</a>
								<div class="card-body">
									<h5 class="card-title h-50"><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h5>
									<div class="card-text mb-4">
										<div class="d-flex justify-content-around mb-4">
											<span title="Màn hình"><i class="fa fa-desktop pr-1"></i>{{ Str::before($product->screen,',') }}</span>       
											<span title="RAM"><i class="fas fa-memory pr-1"></i>{{ Str::before($product->ram,',') }}</span>							               
											<span title="CPU"><i class="fas fa-microchip pr-1"></i>{{ Str::between($product->cpu,'Intel','-') }}</span>
										</div>
										<div class="d-flex">		                       
											<span title="Ổ cứng" class="ml-2 mr-3"><i class="fas fa-hdd pr-1"></i>{{ $product->hard_drive }}</span>            
											<span title="Cân nặng"><i class="fas fa-weight-hanging pr-1"></i>{{ Str::between($product->size,',','kg') }}</span>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<b class="mr-2 text-danger">{{ number_format($product->price),2 }}<u class="ml-1">đ</u></b>
								</div>
							</div>
						</div>
					</div>
				@endforeach	
			</div>	
			{{ $products->withQueryString()->links() }}
    	</div>
		@else
			<div class="pt-4 col-12 pl-0 pr-0">
				<h3 class="text-center bg-warning p-3">Không tìm thấy sản phẩm nào !!!</h3>
			</div>
		@endif	
  </div>
@endsection