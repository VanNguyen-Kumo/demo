<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required:unique:users',
            'security_code'=>[
                'required',
                'size:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[0-9]).+$/'

        ],
            'video_type'=>'required',
            'token_key'=>'nullable',
        ];

    }
    public function messages()
    {
        return [
            'email.required' => 'Dữ liệu không được để trống',
            'email.unique'=>'Email đã tồn tại',
            'security_code.required' => 'Dữ liệu không được để trống',
            'security_code.size'=>'Mã code phải đúng 8 ký tự',
            'security_code.regex'=>'Chữ hoa kèm số',

        ];
    }
    public function attributes(){
        return [
            'security_code'=>'code',
        ];
    }


}
