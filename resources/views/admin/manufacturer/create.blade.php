@extends('admin.layouts.app')
@section('content') 
    <h2 class="mb-3 pt-3">Thêm mới hãng sản xuất</h2>
    <form action="{{route('manufacturer.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <span for="name">Tên:</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="founded_year">Năm thành lập:</span>
            <input type="date" class="form-control @error('founded_year') is-invalid @enderror" id="founded_year" name="founded_year" value="{{ old('founded_year') }}">
            @error('founded_year')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="ceo">CEO:</span>
            <input type="text" class="form-control @error('ceo') is-invalid @enderror" id="ceo" name="ceo" value="{{ old('ceo') }}">
            @error('ceo')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="headquarters">Trụ sở:</span>
            <input type="text" class="form-control @error('headquarters') is-invalid @enderror" id="headquarters" name="headquarters" value="{{ old('headquarters') }}">
            @error('headquarters')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <div class="form-group">
            <span for="image">Logo:</span>
            <input type="file" class="form-control-file border" id="image" name="logo" accept="image/*">
            @error('logo')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu lại</button>
    </form>
@endsection