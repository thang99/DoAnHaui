@extends('admin.layouts.app')
@section('content') 
    <h2 class="pt-3 mb-3">Thêm mới danh mục</h2>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span> 
            @enderror   
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" class="form-control-file border" id="image" name="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea name="content" id="content" cols="5" class="form-control ckeditor"></textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{route('category.index')}}'">Quay lại</button>
    </form>
@endsection