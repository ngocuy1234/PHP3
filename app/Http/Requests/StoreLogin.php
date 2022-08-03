<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogin extends FormRequest
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
            'email_username' => 'required|string',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email_username.required' => 'Không được bỏ trống email  !',
            'email_username.string' => 'Email phải là một chuỗi !',
            'password.required' => 'Không được bỏ trống password  !',
            'password.min' => 'Độ dài mật khẩu quá ngắn !',
        ];
    }
}
