<?php

namespace App\Http\Controllers;
use App\Loai;
use App\SanPham;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Loai(){
        $danhsachloai = Loai::all();
        return view('test.danhsachloai')->with('ds_loai',$danhsachloai);
    }

    public function getSanpham(){
        $danhsachsanpham = SanPham::all();
        return view('test.danhsachsanpham')->with('ds_sanpham',$danhsachsanpham);
    }
}
