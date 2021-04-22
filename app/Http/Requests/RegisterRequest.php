<?php

namespace App\Http\Requests;
use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required:unique:admins',
            'password' => 'required',
            'confirm_password'=>'required|same:password',
        ];

    }
    public function messages()
    {
        return [
            'username.required' => 'Dữ liệu không được để trống',
            'username.unique'=>'Tên đăng nhập đã có',
            'password.required' => 'Dữ liệu không được để trống',
            'confirm_password.same' => 'Mật khẩu không trùng nhau',
            'confirm_password'=>'Không được để trống'
        ];
    }
}
