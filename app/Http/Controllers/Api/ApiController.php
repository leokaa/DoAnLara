<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function thongke_top3_sanpham_moinhat(){
        $result = DB::table('cusc_sanpham')
        ->join('cusc_loai', 'cusc_loai.l_ma', '=' , 'cusc_sanpham.l_ma')
        ->orderBy('l_capNhat')->take(3)->get();


        return response()->json(array(
            'code' => 200,
            'result' => $result
        ));
    }
}
