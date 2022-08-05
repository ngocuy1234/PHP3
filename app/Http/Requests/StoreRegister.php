<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' =>  'required|email|string|unique',
            'name' =>  'required|min:7',
            'address' => 'required',
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống ten  !',
            'name.min' => 'Độ dài tên quá ngắn !',
            'email.required' => 'Không được bỏ trống email  !',
            'email.string' => 'Email phải là một chuỗi !',
            'email.unique' => 'Email này đã tồn tại ! !',
            'password.required' => 'Không được bỏ trống password  !',
            'password.min:6' => 'Độ dài mật khẩu quá ngắn !',
            'address.required' => 'Địa chỉ đang bị bỏ trống !',
            'phone.required' => 'Số điện thoại đang bị bỏ trống !',
            'avatar.required' => 'Bạn chưa chọn chọn avatar !',
            'avatar.mimes' => 'Ảnh sai định dạng !!!',
            'avatar.max' => 'Dung lượng quá lớn !!!',
        ];
    }
}
