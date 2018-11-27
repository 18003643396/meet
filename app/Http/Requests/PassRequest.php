<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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
            
            
            'newpass'=>'required|regex:/^\S{5,12}$/'
           
        ];
    }

     public function messages()
    {
        return [
            
            'newpass.required'  => '密码不能为空',
            'newpass.regex'  => '密码格式不正确',
            
        ];
    }
}
