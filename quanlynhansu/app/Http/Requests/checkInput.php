<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class checkInput extends FormRequest
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
            'hoTen'    =>  'required',
            'diaChi'     =>  'required',
            'tuoi'     =>  'required|numeric',
            'sdt'     =>  'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'hoTen.required' => 'Họ không được bỏ trống',
            'diaChi.required' => 'Tên không được bỏ trống',
            'tuoi.required' => 'Tuổi không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'tuoi.numeric' => 'Tuổi phải là số',
        ];
    }
}
