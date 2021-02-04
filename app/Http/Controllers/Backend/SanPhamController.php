<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\Loai;
use App\HinhAnh;
use Carbon\Carbon;
use Storage;


class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dsSanPham = Sanpham::all();
        $dsSanPham = SanPham::paginate(5);
        return view('backend.sanpham.index')->with('dsSanPham',$dsSanPham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dsLoai = Loai::all();
        return view('backend.sanpham.create')->with('dsLoai',$dsLoai);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = Carbon::now();
        $sp->sp_capNhat = Carbon::now();
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;
        //dd( $sp->l_ma);
        if($request->hasFile('sp_hinh'))
        {
            $file = $request->sp_hinh;
    
            // Lưu tên hình vào column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        //
        if($request->hasFile('sp_hinhanhlienquan')) {
            $files = $request->sp_hinhanhlienquan;
    
            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
                
                $file->storeAs('public/photos', $file->getClientOriginalName());
    
                // Tạo đối tưọng HinhAnh
                $hinhAnh = new HinhAnh();
                $hinhAnh->sp_ma = $sp->sp_ma;
                $hinhAnh->ha_stt = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }
    
        $sp->save();
        return redirect()->route('sanpham.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sp = SanPham::where("sp_ma", $id)->first(); 
        $dsLoai = Loai::all(); 
        
        // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName> 
        // Mặc định đường dẫn gốc của method view() là thư mục `resources/views` 
        // Hiển thị view `backend.sanpham.edit` 
        return view('backend.sanpham.edit')
            // với dữ liệu truyền từ Controller qua View, được đặt tên là `sp` và `danhsachloai`
        ->with('sp', $sp)
        ->with('dsLoai', $dsLoai);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sp = SanPham::where("sp_ma",  $id)->first();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?
        if($request->hasFile('sp_hinh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);

            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->sp_hinh;
            $sp->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        $sp->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-success', 'Cập nhật thành công ^^~!!!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response;
     */
    public function destroy($id)
    {
        $sp = SanPham::where("sp_ma",  $id)->first();

        // Nếu tìm thấy được sản phẩm thì tiến hành thao tác DELETE
        if(empty($sp) == false)
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sp->sp_hinh);
        }
        $sp->delete();

        // Hiển thị câu thông báo 1 lần (Flash session)
        //Session::flash('alert-success', 'Xóa sản phẩm thành công ^^~!!!');

        // Điều hướng về trang index
        return redirect()->route('admin.sanpham.index');
    }

    /**
     * Action hiển thị biểu mẫu xem trước khi in trên Web
     */
    public function print()
    {
        $ds_sanpham = Sanpham::all();
        $ds_loai    = Loai::all();

        return view('backend.sanpham.print')
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachloai', $ds_loai);
    }
}
