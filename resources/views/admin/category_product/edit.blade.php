@extends('admin.layouts.app')
@section('content') 
    <h2 class="pt-3 mb-3">Thay đổi danh mục-sản phẩm</h2>
    @if (session('status'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{session('status')}}</strong>
        </div>
    @endif
    <form action="{{route('category_product.update',$category_product->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label>Tên danh mục:</label>
            <select name="category" class="form-control">
                <option value="{{ $category_product->category_id }}"> {{ $category_product->categories->name }} </option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <select name="product" class="form-control">
                <option value="{{ $category_product->product_id }}"> {{ $category_product->products->name }} </option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{route('category_product.index')}}'">Quay lại</button>
    </form>
@endsection