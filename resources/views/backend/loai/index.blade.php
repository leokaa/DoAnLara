@extends('backend.layouts.master')

@section('title')
    'Trang index loai'
@endsection

@section('content')

@if(Session::has('alert-success'))
<div class="alert alert-info" role="alert">
  {{ Session::get('alert-success') }}
</div>
@endif
<a href="{{ route('loai.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a>
<table border="2" width=100% class="table">
<tr>
    <thead class="table-light">
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th>Tạo mới</th>
        <th>Cập nhật</th>
        <th>Trạng thái</th>
        <th>Hanh dong</th>
    </thead>
    
</tr>

@foreach($dsLoai as $loai)
<tr>
    <td>{{$loai->l_ma}}</td>
    <td>{{$loai->l_ten}}</td>
    <td>{{$loai->l_taoMoi}}</td>
    <td>{{$loai->l_capNhat}}</td>
    <td>
        <?php
            $tentrangthai = ' ';
            if($loai->l_trangThai==1){
                $tentrangthai = 'khóa';

            }
            else if($loai->l_trangThai==2){
                $tentrangthai = 'khả dụng';
            }
        ?>
        {{$tentrangthai}}
    </td>
    <td>

        <a href="{{route('loai.edit',['id'=> $loai->l_ma]) }}" class="btn btn-danger pull-left">Sửa</a>
        
        <form class="fDelete btn p-0" method="POST" action="{{ route('loai.destroy', ['id' => $loai->l_ma]) }}" data-id="{{ $loai->l_ma }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-warning"  >Xoa</button>
                </form>
    </td>
</tr>
@endforeach
</table>


@endsection

@section('custom-alert')
<script>
    $(document).ready(function() {
        $('.fDelete').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Bạn muốn xóa?',
                text: "Dữ liệu sẽ không thể phục hồi lại được",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Chấp nhận',
                cancelButtonText: 'Hủy bỏ'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: {
                            id: $(this).data('id'),
                            _token: $(this).find('[name="_token"]').val(),
                            _method: $(this).find('[name="_method"]').val()
                        },
                        success: function(data, textStatus, jqXHR) {
                            location.href = "{{ route('loai.index') }}";
                        }
                    })
                } else {
                    Swal.fire(
                        'Đã hủy xóa!'
                    )
                }
            })
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>
@endsection