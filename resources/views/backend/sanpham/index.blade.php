@extends('backend.layouts.master')

@section('title')
'Trang index san pham'
@endsection

@section('content')

@if(Session::has('alert-success'))
<div class="alert alert-info" role="alert">
    {{ Session::get('alert-success') }}
</div>
@endif
<h1 style="color: red;">Danh sách sản phẩm</h1>
<a href="{{ route('admin.sanpham.print') }}" class="btn btn-primary">In ấn</a>
<a href="{{ route('admin.sanpham.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a>
<table border="2px" width="100%" class="table">
    <thead class="thead-dark">
        <tr>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Hinh</th>
            <th>Thông tin</th>
            <th>Tạo mới</th>
            <th>Cập nhật</th>
            <th>Trạng thái</th>
            <th>Loại sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsSanPham as $sp )
        <tr>
            <td>{{$sp->sp_ma}}</td>
            <td>{{$sp->sp_ten}}</td>
            <td>{{$sp->sp_hinh}}</td>
            <td>{{$sp->sp_thongTin}}</td>
            <td>{{$sp->sp_taoMoi}}</td>
            <td>{{$sp->sp_capNhat}}</td>
            <td>{{$sp->sp_trangThai}}</td>
            <td>{{$sp->loaisanpham->l_ten}}</td>
            <td>
                <a href="{{route('admin.sanpham.edit',['id' => $sp->sp_ma]) }}" class="btn btn-danger pull-left">Sửa</a>
                <form class="fDelete btn p-0" method="POST" 
                action="{{ route('admin.sanpham.destroy', ['id' => $sp->sp_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="sumbit" class="btn btn-warning">Xóa</button>
                </form>
            </td>
        @endforeach
        </tr>
    </tbody>
</table>
{{ $dsSanPham->links() }}
@endsection