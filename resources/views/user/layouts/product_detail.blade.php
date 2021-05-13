@extends('user.layouts.app')
@section('content')
    @include('user.layouts.__partials.breadcrum',['name' => $product->name ])
    <div class="main">
        <div class="row mt-3">
            <h4>               
                {{ $product->name }} / {{Str::before($product->ram,',')}} / {{Str::before($product->operator_system,'Home')}} / {{ $product->hard_drive }}
            </h4>
        </div>
        <hr>
        <div class="row align-content-center pt-5 pb-5" style="background-color: #fff">
            <div class="col-6">
                <img src="{{ asset('images/products/'.$product->image) }}" alt="image laptop" style="width:585px;margin-top:20px;">  
            </div>
            <div class="col-6">
                <h3>
                    <span style="font-size: 20px" class="mr-2">Giá: <span class="text-bold text-danger">{{ number_format($product->price),2 }}<u class="ml-1">đ</u></span></span>
                </h3>
                <form action="{{route('carts.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-danger" onclick="return alert('Thêm sản phẩm vào giỏ hàng thành công !') "><i class="fas fa-cart-plus mr-2"></i>Thêm vào giỏ hàng</button>
                </form>
                <h5 class="mt-4 mb-4" >Thông số kỹ thuật</h5>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>CPU</td>
                        <td>{{ $product->cpu }}</td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td>{{ $product->ram }}</td>
                    </tr>
                    <tr>
                        <td>Màn hình</td>
                        <td>{{ $product->screen }}</td>
                    </tr>
                    <tr>
                        <td>Ổ cứng</td>
                        <td>{{ $product->hard_drive }}</td>
                    </tr>
                    <tr>
                        <td>Hệ điều hành</td>
                        <td>{{ $product->operator_system }}</td>
                    </tr>
                    <tr>
                        <td style="width:200px">Trọng lượng(kg)</td>
                        <td>{{ Str::after($product->size,',') }}</td>
                    </tr>
                    <tr>
                        <td>Kích thước(mm)</td>
                        <td>{{ Str::before($product->size,',') }}</td>
                    </tr>
                    <tr>
                        <td>Xuất xứ</td>
                        <td>{{ $product->origin }}</td>
                    </tr>
                    <tr>
                        <td>Năm ra mắt</td>
                        <td>{{ $product->year_of_launch }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <div class="row p-4" style="background-color: #fff">
            <div class="col-12">
                <h3 class="mb-4 text-center"><b>Đặc điểm nổi bật của {{ $product->name }}</b></h3>
                <div>
                    {!! $product->description !!}
                </div> 
            </div>
        </div>
        <hr>
        <div class="row p-5" style="background-color: #fff">
            <div class="col-12">
                <h5 class="mb-4">Đánh giá về {{ $product->name }}</h5>
                <div class="d-flex justify-content-around align-items-center">
                    @if (count($ratings) > 0)
                        <div class="w-25">
                            @php
                                $sum = 0;
                            @endphp
                            <p>Đánh Giá Trung Bình:</p>
                            @for ($i = 0; $i < count($ratings); $i++)
                                @php
                                    $sum += $ratings[$i]->evaluate;
                                    $avg = number_format($sum/count($ratings),2);
                                @endphp 
                            @endfor         
                            <h3 class="text-danger text-bold">
                                    {{ ceil($avg) }} / 5
                            </h3>
                            @if (ceil($avg) == 5)
                                <ul class="d-flex mt-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="stars">
                                            <i class='fas fa-star'></i>
                                        </li> 
                                    @endfor
                                </ul>
                            @elseif (ceil($avg) == 4)
                                <ul class="d-flex mt-2">
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                </ul>
                            @elseif (ceil($avg) == 3)
                                <ul class="d-flex mt-2">
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class="far fa-star"></i>
                                    </li> 
                                </ul>
                            @elseif (ceil($avg) == 2)
                                <ul class="d-flex mt-2">
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class="far fa-star"></i>
                                    </li>
                                </ul>
                            @elseif (ceil($avg) == 1)
                                <ul class="d-flex mt-2">
                                    <li class="stars">
                                        <i class='fas fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                    <li class="stars">
                                        <i class='far fa-star'></i>
                                    </li>
                                </ul>
                            @else
                                <ul class="d-flex mt-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="stars">
                                            <i class='far fa-star'></i>
                                        </li> 
                                    @endfor
                                </ul>
                            @endif       
                            <small>{{ count($ratings) }} đánh giá</small> 
                        </div>
                        <div class="w-25">
                            <ul>
                                <li class="d-flex stars">
                                    <div class="w-100">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($ratings as $rating)
                                            @if ($rating->evaluate == 5)
                                                @php
                                                    $count++;
                                                @endphp 
                                            @endif      
                                        @endforeach
                                        <span>5</span>
                                        <span><i class='fas fa-star'></i></span>
                                        <div class="progress w-75">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php
                                            echo ceil(($count / count($ratings)) *100) ;?>%"></div>
                                        </div>
                                        <span class="qty_user">{{ $count }}</span>   
                                    </div>
                                </li>
                                <li class="d-flex stars">
                                    <div class="w-100">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($ratings as $rating)
                                            @if ($rating->evaluate == 4)
                                                @php
                                                    $count++;
                                                @endphp                                                
                                            @endif
                                        @endforeach
                                        <span>4</span>
                                        <span><i class='fas fa-star'></i></span>
                                        <div class="progress w-75">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php
                                            echo ceil(($count / count($ratings)) *100) ;?>%"></div>
                                        </div>
                                        <span class="qty_user">{{ $count }}</span> 
                                    </div>
                                </li>
                                <li class="d-flex stars">
                                    <div class="w-100">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($ratings as $rating)
                                            @if ($rating->evaluate == 3)
                                                @php
                                                    $count++;
                                                @endphp                                                
                                            @endif
                                        @endforeach
                                        <span>3</span>
                                        <span><i class='fas fa-star'></i></span>
                                        <div class="progress w-75">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php
                                            echo ceil(($count / count($ratings)) *100) ;?>%"></div>
                                        </div> 
                                        <span class="qty_user">{{ $count }}</span>   
                                    </div>
                                </li>
                                <li class="d-flex stars">
                                    <div class="w-100">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($ratings as $rating)
                                            @if ($rating->evaluate == 2)
                                                @php
                                                    $count++;
                                                @endphp                                                
                                            @endif
                                        @endforeach
                                        <span>2</span>
                                        <span><i class='fas fa-star'></i></span>
                                        <div class="progress w-75">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php
                                            echo ceil(($count / count($ratings)) *100) ;?>%"></div>
                                        </div>                 
                                    <span class="qty_user">{{ $count }}</span> 
                                    </div>
                                </li>
                                <li class="d-flex stars">
                                    <div class="w-100">
                                        @php
                                            $count = 0;
                                        @endphp
                                        @foreach ($ratings as $rating)
                                            @if ($rating->evaluate == 1)
                                                @php
                                                    $count++;
                                                @endphp                                                
                                            @endif
                                        @endforeach
                                        <span>1</span>
                                        <span><i class="fas fa-star"></i></span>
                                        <div class="progress w-75">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: <?php
                                            echo ceil(($count / count($ratings)) *100) ;?>%"></div>
                                        </div>
                                        <span class="qty_user">{{ $count }}</span> 
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="w-25 ml-5">
                            <form>
                                @csrf
                                <input type="hidden" class="product_id" value="{{ $product->id }}">
                                <input type="hidden" class="user_id" value="{{ Auth::id() }}">
                                <ul id="stars" class="d-flex mt-5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li class="star star-rating" data-value={{$i}} name="star">
                                            <i class="fas fa-star"></i>
                                        </li> 
                                    @endfor
                                </ul>
                                <button type="button" class="btn btn-danger send-rating">Gửi đánh giá của bạn</button>
                                <div id="noti-send-rating"></div>
                            </form>
                        </div>
                    @else
                    <div class="w-25">
                        <p>Đánh Giá Trung Bình:</p>        
                        <h3 class="text-danger text-bold">
                                0 / 5
                        </h3>
                        <ul class="d-flex mt-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <li class="stars" data-value={{$i}} value={{$i}}>
                                    <i class='fas fa-star'></i>
                                </li> 
                            @endfor
                        </ul>
                        <small>0 đánh giá</small> 
                    </div>
                    <div class="w-25">
                        <ul>
                            <li class="d-flex stars">
                                <div class="w-100">
                                    <span>5</span>
                                    <span><i class='fas fa-star'></i></span>
                                    <div class="progress w-75">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                    </div>
                                    <span class="qty_user">0</span>   
                                </div>
                            </li>
                            <li class="d-flex stars">
                                <div class="w-100">
                                    <span>4</span>
                                    <span><i class='fas fa-star'></i></span>
                                    <div class="progress w-75">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                    </div>
                                    <span class="qty_user">0</span> 
                                </div>
                            </li>
                            <li class="d-flex stars">
                                <div class="w-100">
                                    <span>3</span>
                                    <span><i class='fas fa-star'></i></span>
                                    <div class="progress w-75">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                    </div> 
                                    <span class="qty_user">0</span>   
                                </div>
                            </li>
                            <li class="d-flex stars">
                                <div class="w-100">
                                    <span>2</span>
                                    <span><i class='fas fa-star'></i></span>
                                    <div class="progress w-75">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                    </div>                 
                                <span class="qty_user">0</span> 
                                </div>
                            </li>
                            <li class="d-flex stars">
                                <div class="w-100">
                                    <span>1</span>
                                    <span><i class="fas fa-star"></i></span>
                                    <div class="progress w-75">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"></div>
                                    </div>
                                    <span class="qty_user">0</span> 
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-25 ml-5">
                        <form>
                            @csrf
                            <input type="hidden" class="product_id" value="{{ $product->id }}">
                            <input type="hidden" class="user_id" value="{{ Auth::id() }}">
                            <ul id="stars" class="d-flex mt-5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="star star-rating" data-value={{$i}} name="star">
                                        <i class="fas fa-star"></i>
                                    </li> 
                                @endfor
                            </ul>
                            <button type="button" class="btn btn-danger send-rating">Gửi đánh giá của bạn</button>
                            <div id="noti-send-rating"></div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row pl-5 pr-5" style="background-color: #fff">
            <div class="col-12">
                <h4 class="mt-5 mb-3">Hỏi & đáp về {{ $product->name }}</h4>
                <form action="{{ route("post-comment")}}" method="POST">  
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    <textarea class="form-control" name="comment_content" placeholder="Viết câu hỏi của bạn ..." rows="5"></textarea>
                    @if (session('alter'))
                        <div class="text-danger">{{ session('alter') }}</div>
                    @endif
                    <button type="submit" class="btn btn-success mt-3">Gửi câu hỏi</button>
                </form>
                <hr>
                <div class="comments mt-5">
                    @foreach ($comments as $comment)
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('images/user.png') }}" alt="logo_user" width="35" height="35">
                            <div class="ml-3">
                                <h6 style="margin-bottom: -3px">{{ $comment->user->name }}</h6>
                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <p>{{ $comment->content }} 
                            <small class="text-primary ml-3" data-toggle="collapse" data-target="#demo" style="cursor: pointer;">Trả lời</small>
                            <form action="{{ route("post-feedback")}}" method="POST" id="demo" class="collapse">  
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                <textarea class="form-control" name="feedback_content" placeholder="Viết câu trả lời của bạn ..." rows="5"></textarea>
                                @if (session('alter'))
                                    <div class="text-danger">{{ session('alter') }}</div>
                                @endif
                                <button type="submit" class="btn btn-primary mt-3 float-right">Gửi câu trả lời</button>
                            </form>
                        </p>     
                    @endforeach
                </div>
                <div class="feedbacks ml-5 pl-3" style="border-left:5px solid rgb(219, 27, 27) ">
                    @foreach ($feedbacks as $feedback)
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{ asset('images/user.png') }}" alt="logo_user" width="35" height="35">
                            <div class="ml-3">
                                <h6 style="margin-bottom: -3px">{{ $feedback->senders[0]->name }}</h6>
                                <small>{{ $feedback->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        <p>{{ $feedback->content }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        @if (count($products)>0)
            <div class="row p-5" style="background-color: #fff">
                <div class="col-12">
                    <h4>Một số sản phẩm liên quan</h4>
                    <div class="row">
                        @foreach ($products as $item)
                            <div class="col-3 mb-5 mt-4">
                                <div class="card-deck h-100">
                                    <div class="card">
                                        <a href="/product/{{ $item->id }}">
                                            <img class="card-img-top" src="{{ asset('images/products/'.$item->image) }}" alt="product images">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title h-50"><a href="/product/{{ $item->id }}">{{ $item->name }}</a></h5>
                                            <div class="card-text mb-4">
                                                <div class="d-flex justify-content-around mb-4">
                                                    <span title="Màn hình"><i class="fa fa-desktop pr-1"></i>{{ Str::before($item->screen,',') }}</span>       
                                                    <span title="RAM"><i class="fas fa-memory pr-1"></i>{{ Str::before($item->ram,',') }}</span>							               
                                                    <span title="CPU"><i class="fas fa-microchip pr-1"></i>{{ Str::between($item->cpu,'Intel','-') }}</span>
                                                </div>
                                                <div class="d-flex">		                       
                                                    <span title="Ổ cứng" class="ml-2 mr-3"><i class="fas fa-hdd pr-1"></i>{{ $item->hard_drive }}</span>            
                                                    <span title="Cân nặng"><i class="fas fa-weight-hanging pr-1"></i>{{ Str::between($item->size,',','kg') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <b class="mr-2 text-danger">{{ number_format($item->price),2 }}<u class="ml-1">đ</u></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection