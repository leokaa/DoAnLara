<h1>Danh sách loại</h1>

<table border="1">
<tr>
    <th>Mã loại</th>
    <th>Tên loại</th>
    <th>Tạo mới</th>
    <th>Cập nhật</th>
    <th>Trạng thái</th>
    <th>Số sản phẩm</th>
</tr>

@foreach($ds_loai as $loai)
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
    <td>{{$loai->danhsachsanpham->count()}}</td>
</tr>
@endforeach
    

</table>