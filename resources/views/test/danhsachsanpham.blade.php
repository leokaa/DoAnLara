<h1>Danh sách loại</h1>

<table border="1" width=100%>
<tr>
    <th>Mã </th>
    <th>Tên </th>
    <th>Tạo mới</th>
    <th>Cập nhật</th>
    <th>Trạng thái</th>
    <th>Loại sản phẩm</th>
</tr>

@foreach($ds_sanpham as $sp)
<tr>
    <td>{{$sp->sp_ma}}</td>
    <td>{{$sp->sp_ten}}</td>
    <td>{{$sp->sp_taoMoi}}</td>
    <td>{{$sp->sp_capNhat}}</td>
    <td>
        <?php
            $tentrangthai = ' ';
            if($sp->sp_trangThai==1){
                $tentrangthai = 'khóa';

            }
            else if($sp->sp_trangThai==2){
                $tentrangthai = 'khả dụng';
            }
        ?>
        {{$tentrangthai}}
    </td>
    <td>{{$sp->loaisanpham->l_ten}}</td>
</tr>
@endforeach
    

</table>