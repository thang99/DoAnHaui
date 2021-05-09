@extends('admin.layouts.app')
@section('content') 
    <h2 class="pt-3 mb-3">Thay đổi thông tin danh mục</h2>
    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" readonly value="<?= $category->id ?>">
        </div>
        <div class="form-group">
            <label for="name">Tên danh mục:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $category->name ?>">
            @error('name')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <img src="{{ asset('/images/categories/'.$category->image) }}" alt="logo">
            <input type="file" class="form-control-file border" id="image" name="image" >
            @error('image')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea name="content" id="content" rows="5" class="form-control ckeditor" value=""><?= $category->content ?></textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('category.index') }}'">Trở lại</button>
    </form>
 
@endsection