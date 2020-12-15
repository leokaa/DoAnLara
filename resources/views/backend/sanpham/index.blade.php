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
        </tr>
    </thead>
    <tbody>
        @foreach($dsSanPham as $sp)
        <tr>
            <td>{{$sp->sp_ma}}</td>
            <td>{{$sp->sp_ten}}</td>
            <td>{{$sp->sp_hinh}}</td>
            <td>{{$sp->sp_thongTin}}</td>
            <td>{{$sp->sp_taoMoi}}</td>
            <td>{{$sp->sp_capNhat}}</td>
            <td>{{$sp->sp_trangThai}}</td>
            <td>{{$sp->loaisanpham->l_ten}}</td>
        @endforeach            
        </tr>
    </tbody>
</table>

@endsection