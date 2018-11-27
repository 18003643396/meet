<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RotateRequest extends FormRequest
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
            'img' => 'required',
            
            'position'=>'required'
            
        ];
    }

     public function messages()
    {
        return [
            'img.required' => '图片不能为空',
            'position.required' => '请选择图片位置'
            
            
        ];
    }
}
