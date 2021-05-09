@extends('admin.layouts.app')
@section('content')
    <h2 class="mb-5 pt-3">Danh sách hãng sản xuất</h2>
    <form action="{{ route('search_manufacturer') }}" method="GET">
        <div class="form-group d-flex mb-3">
            <input type="text" placeholder="Tìm kiếm theo tên hãng sản xuất" name="manufacturer" class="form-control w-25">
            <button type="submit" class="btn btn-success ml-4">Tìm kiếm</button>
        </div>
    </form>
    <table class="table table-bordered table-hover text-center">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Năm thành lập</th>
            <th>CEO</th>
            <th>Trụ sở</th>
            <th>Logo</th>
            <th>Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($manufacturers as $manufacturer)
            <tr>
                <td>{{ $manufacturer->id }}</td>
                <td>{{ $manufacturer->name }}</td>
                <td>{{ $manufacturer->founded_year }}</td>
                <td>{{ $manufacturer->ceo }}</td>
                <td>{{ $manufacturer->headquaters }}</td>
                <td>
                    <img src="{{ asset('images/manufacturer/'.$manufacturer->logo) }}" alt="logo" width="50" height="50">       
                </td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('manufacturer.edit',$manufacturer->id) }}" class="btn btn-success btn-sm" role="button">
                        <i class="fa fa-edit mr-1" aria-hidden="true"></i> Thay đổi
                    </a> &nbsp;
                    <form action="{{ route('manufacturer.destroy',$manufacturer->id) }}" method="POST" enctype="multipart/form-data">
                        @method('DELETE') 
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn xóa hãng sản xuất này không ?')">
                            <i class="fa fa-trash mr-1" aria-hidden="true"></i> Xóa
                        </button>
                    </form>
                </td>            
            </tr> 
            @endforeach
        </tbody>
    </table>
    {{ $manufacturers->links() }}
@endsection