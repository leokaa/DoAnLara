<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('frontend.layouts.master');
});
Route::get('/hello','ExampleController@xinchao');
Route::get('/goodbye','ExampleController@tambiet');
Route::get('/tinh','ExampleController@tinh');

Route::get('testdanhsachloai','TestController@Loai');
Route::get('testdanhsachsanpham','TestController@getSanpham');
Route::get('testgiaodienbackend', function(){
    return view('test.testbackend');
});

//Backend loai
Route::get('/admin/loai','Backend\LoaiController@index')->name('loai.index');
    //Them loai
Route::get('/admin/loai/create','Backend\LoaiController@create')->name('loai.create');
Route::post('/admin/loai/store','Backend\LoaiController@store')->name('loai.store');
    //Sua loai
Route::get('/admin/loai/edit/{id}','Backend\LoaiController@edit')->name('loai.edit');
Route::put('/admin/loai/update/{id}','Backend\LoaiController@update')->name('loai.update');
    //xoa loai
Route::delete('admin/loai/destroy/{id}', 'Backend\LoaiController@destroy')->name('loai.destroy');


//Backend sanpham
Route::get('/admin/sanpham/print', 'Backend\SanPhamController@print')->name('admin.sanpham.print');
Route::get('/admin/danhsachsanpham/pdf', 'Backend\SanPhamController@pdf')->name('danhsachsanpham.pdf');
route::resource('/admin/sanpham','Backend\SanPhamController',['as' => 'admin']);





/* Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
});
 */
Route::get('/lienhe','Frontend\FrontendController@contact')->name('frontend.page.contact');
Route::get('/lienhe','Frontend\FrontendController@contact')->name('frontend.page.contact');
Route::post('/lienhe/goiloinhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.page.contact.sendMailContactForm');

Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');