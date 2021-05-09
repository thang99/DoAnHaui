@extends('admin.layouts.app')
@section('content') 
    <h2 class="mb-3 pt-3">Sửa thông tin sản phẩm</h2>
    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <span for="id">ID:</span>
            <input type="text" class="form-control" id="id" name="id" value="<?= $product->id ?>" readonly>
        </div>
        <div class="form-group">
            <span for="name">Tên sản phẩm:</span>
            <input type="text" class="form-control" id="name" name="name" value="<?= $product->name ?>">
        </div>
        <div class="form-group">
            <span for="ram">RAM:</span>
            <input type="text" class="form-control" id="ram" name="ram" value="<?= $product->ram ?>">
        </div>
        <div class="form-group">
            <span for="cpu">CPU:</span>
            <input type="text" class="form-control" id="cpu" name="cpu" value="<?= $product->cpu ?>">
        </div>
        <div class="form-group">
            <span for="hard_drive">Ổ cứng:</span>
            <input type="text" class="form-control" id="hard_drive" name="hard_drive" value="<?= $product->hard_drive ?>">
        </div>
        <div class="form-group">
            <span for="screen_size">Màn hình:</span>
            <input type="text" class="form-control" id="screen_size" name="screen" value="<?= $product->screen ?>">
        </div>
        <div class="form-group">
            <span for="image">Hình ảnh:</span>
            <img src="{{ asset('/images/products/'.$product->image) }}" alt="logo" width="50" height="50">
            <input type="file" class="form-control-file border" id="image" name="image">
        </div>
        <div class="form-group">
            <span for="price">Giá:</span>
            <input type="text" class="form-control" id="price" name="price" value="<?= $product->price ?>">
        </div>
        <div class="form-group">
            <span for="os">Hệ điều hành:</span>
            <input type="text" class="form-control" id="os" name="operator_system" value="<?= $product->operator_system ?>">
        </div>
        <div class="form-group">
            <span for="status">Trạng thái:</span>
            <div class="form-check-inline ml-3">
                <span class="form-check-span">
                    <input type="radio" class="form-check-input" name="status" value="1">Đặc biệt
                </span>
                </div>
            <div class="form-check-inline">
                <span class="form-check-span">
                    <input type="radio" class="form-check-input" name="status" value="0">Bình thường
                </span>
            </div>
            <div class="form-check-inline">
                <span class="form-check-span">
                    <input type="radio" class="form-check-input" name="status" value="2">Hot
                </span>
            </div>
        </div>
        <div class="form-group">
            <span for="description">Mô tả:</span>
            <textarea name="description" id="description" class="form-control ckeditor" rows="5">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <span for="size">Kích thước:</span>
            <input type="text" class="form-control" id="size" name="size" value="<?= $product->size ?>">
        </div>
        <div class="form-group">
            <span for="quantity">Số lượng:</span>
            <input type="text" class="form-control" id="quantity" name="quantity" value="<?= $product->quantity ?>">
        </div>     
        <div class="form-group">
            <span for="sel1">Hãng sản xuất:</span>
            <select class="form-control" id="sel1" name="manufacturer">
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <span for="year">Năm ra mắt:</span>
            <input type="text" class="form-control" id="year" name="year" value="<?= $product->year_of_launch ?>">
        </div> 
        <div class="form-group">
            <span for="origin">Xuất xứ:</span>
            <input type="text" class="form-control" id="origin" name="origin" value="<?= $product->origin ?>">
        </div> 
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{route('product.index')}}'">Quay lại</button>
    </form>
@endsection