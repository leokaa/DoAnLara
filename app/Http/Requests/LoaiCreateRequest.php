<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'l_ten' => 'required|min:3|max:50|unique:cusc_loai', //tên table cusc_chude
            'l_trangThai' => 'required', 
        ];
    }

    public function messages() 
    {
        return [
            'l_ten.required' => 'Tên chủ đề bắt buộc nhập',
            'l_trangThai.required' => 'Tên chủ đề bắt buộc nhập',
            'l_ten.min' => 'Tên chủ đề ít nhất phải 3 ký tự trở lên',
            'l_ten.max' => 'Tên chủ đề tối đa chỉ 50 ký tự',
            'l_ten.unique' => 'Tên chủ đề này đã tồn tại. Vui lòng nhập tên chủ đề khác'
        ];
    }
}
