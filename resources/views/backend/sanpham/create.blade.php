@extends('backend.layouts.master')

@section('title')
Trang them moi loai
@endsection

@section('custom-css')
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection


@section('content')


    <form method="post" action="{{ route('admin.sanpham.store') }}" enctype="multipart/form-data">
         {{ csrf_field() }}

        <div class="form-group">
            <label for="l_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{old('sp_ten')}}">
        </div>
        <div class="form-group">
            <label for="sp_giaGoc">Giá gốc</label>
            <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{old('sp_giaGoc')}}">
        </div>
        <div class="form-group">
            <label for="l_ten">Giá bán</label>
            <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{old('sp_giaBan')}}">
        </div>
        <div class="form-group">
            <label for="l_ten">Thông tin</label>
            <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{old('sp_thongTin')}}">
        </div>
        <div class="form-group">
            <label for="l_ten">Đánh giá</label>
            <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{old('sp_danhGia')}}">
        </div>
        <div class="form-group">
            <label for="l_ten">Tạo mới</label>
            <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" value="{{old('sp_taoMoi')}}">
        </div>
        <div class="form-group">
            <label for="l_ten">Cập nhật</label>
            <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" value="{{old('sp_capNhat')}}">
        </div>
        <div class="form-group">
        <label for="sp_trangThai">Trạng thái</label>

        <select name="sp_trangThai" id="sp_trangThai" class="form-select" aria-label="Default select example">
            <option value="1">Khả dụng</option>
            <option value="2">Khóa</option>
        </select>
        </div>
        <div class="form-group">
            <label for="l_ma">Loại sản phẩm</label>
            <select name="l_ma" id="l_ma" class="form-select" aria-label="Default select example">
                @foreach($dsLoai as $loai)
                    @if(old('l_ma') == $loai->l_ma)
                    <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                    @else
                    <option value="{{ $loai->l_ma }}" >{{ $loai->l_ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <div class="file-loading">
                <label>Hình đại diện</label>
                <input id="sp_hinh" type="file" name="sp_hinh">
            </div>
        </div>
        <div class="form-group">
            <div class="file-loading">
            <label>Hình ảnh liên quan sản phẩm</label>
            <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>

    </form>
@endsection

@section('custom-js')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
            });
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

<script>
     $(document).ready(function() {
    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá gốc
    $('#sp_giaGoc').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá bán
    $('#sp_giaBan').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày tạo mới
    $('#sp_taoMoi').inputmask({
      alias: 'datetime',
      inputFormat: 'yyyy-mm-dd' // Định dạng Năm-Tháng-Ngày
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày cập nhật
    $('#sp_capNhat').inputmask({
      alias: 'datetime',
      inputFormat: 'yyyy-mm-dd' // Định dạng Năm-Tháng-Ngày
    });
  });
</script>

@endsection