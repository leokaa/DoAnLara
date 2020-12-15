@extends('backend.layouts.master')

@section('title')
Trang them moi loai
@endsection

@section('content')


    <form method="post" action="{{ route('loai.store') }}" enctype="multipart/form-data">
         {{ csrf_field() }}

        <div class="form-group">
            <label for="l_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{old('l_ten')}}">
        </div>
        <select name="l_trangThai" id="l_trangThai" class="form-select" aria-label="Default select example">
            <option value="1" {{ old('l_trangThai') == 1 ? 'selected' : '' }}>Khả dụng</option>
            <option value="2" {{ old('l_trangThai') == 2 ? 'selected' : '' }}>Khóa</option>
        </select>
    
        <button type="submit" class="btn btn-primary">Lưu</button>

    </form>
@endsection