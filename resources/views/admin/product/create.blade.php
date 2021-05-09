@extends('admin.layouts.app')
@section('content') 
    <h2 class="mb-3 pt-3">Thêm mới sản phẩm</h2>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <span for="name">Tên sản phẩm:</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="ram">RAM:</span>
            <input type="text" class="form-control @error('ram') is-invalid @enderror" id="ram" name="ram">
            @error('ram')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="cpu">CPU:</span>
            <input type="text" class="form-control @error('cpu') is-invalid @enderror" id="cpu" name="cpu">
            @error('cpu')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="hard_drive">Ổ cứng:</span>
            <input type="text" class="form-control @error('hard_drive') is-invalid @enderror" id="hard_drive" name="hard_drive">
            @error('hard_drive')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="screen_size">Màn hình:</span>
            <input type="text" class="form-control @error('screen') is-invalid @enderror" id="screen_size" name="screen">
            @error('screen')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="image">Hình ảnh:</span>
            <input type="file" class="form-control-file border @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="price">Giá:</span>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
            @error('price')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="os">Hệ điều hành:</span>
            <input type="text" class="form-control @error('operator_system') is-invalid @enderror" id="os" name="operator_system">
            @error('operator_system')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
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
            @error('status')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="description">Mô tả:</span>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror ckeditor" rows="5"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="size">Kích thước:</span>
            <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size">
            @error('size')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="quantity">Số lượng:</span>
            <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity">
            @error('quantity')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>     
        <div class="form-group">
            <span for="sel1">Hãng sản xuất:</span>
            <select class="form-control" id="sel1" name="manufacturer">
                @foreach ($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                @endforeach
            </select>
            @error('manufacturer')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="year">Năm ra mắt:</span>
            <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year">
            @error('year')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div> 
        <div class="form-group">
            <span for="origin">Xuất xứ:</span>
            <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" name="origin">
            @error('origin')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div> 
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{route('product.index')}}'">Quay lại</button>
    </form>
@endsection