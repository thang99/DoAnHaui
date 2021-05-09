@extends('admin.layouts.app')
@section('content') 
    <h2 class="mb-3 pt-3">Thay đổi thông tin slide</h2>
    <form action="{{route('slide.update',$slide->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <span for="id">ID:</span>
            <input type="text" class="form-control" id="id" name="id" value="<?= $slide->id; ?>" readonly>
        </div>
        <div class="form-group">
            <span for="name">Tên:</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="<?= $slide->name; ?>">
            @error('name')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <div class="form-group">
            <span for="content">Nội dung:</span>
            <textarea name="content" id="ckeditor1" rows="5" class="form-control ckeditor @error('content') is-invalid @enderror" value=""><?= $slide->content ?></textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <div class="form-group">
            <span for="image">Hình ảnh:</span>
            <img src="{{ asset('images/slides/'.$slide->image) }}" alt="logo" width="50" height="50">
            <input type="file" class="form-control-file border @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            @error('image')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <div class="form-group">
            <span for="link">Link ảnh:</span>
            <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="<?= $slide->link; ?>">
            @error('link')
                <span class="text-danger">{{ $message }}</span>    
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{route('slide.index')}}'">Trở lại</button>
    </form>
@endsection