<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'name'=>'required|unique:videos',
            'url'=>'required',
            'thumbnail_url'=>'required|mimes:jpg,png,jpeg|max:5048'
        ];
    }
    public function messages()
    {
       return[
         'name.required'=>'không được để trống',
         'name.unique'=>'Tên video đã tồn tại',
         'url.required'=>'không được để trống',
         'thumbnail_url.required'=>'không được để trống',
           'thumbnail_url.mimes'=>'Định dạng jpg,png,jpeg',
       ];
    }
}
