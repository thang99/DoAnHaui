@extends('admin.layouts.app')
@section('content') 
    <h2 class="pt-3 mb-3">Thêm mới slide</h2>
    <form action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <span for="name">Tên:</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <div class="form-group">
            <span for="content">Nội dung:</span>
            <textarea name="content" id="ckeditor" rows="5" class="form-control @error('content') is-invalid @enderror ckeditor" value="{{ old('content') }}"></textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <div class="form-group">
            <span for="image">Hình ảnh:</span>
            <input type="file" class="form-control-file border @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            @error('image')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <div class="form-group">
            <span for="link">Link ảnh:</span>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}">
            @error('link')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
    </form>
@endsection