<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserupdateRequest extends FormRequest
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
            'name' => 'required|regex:/^\S{4,16}$/',
            'tel'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email',
        ];
    }

     public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.regex'=>'用户名格式不正确',
            
            'tel.regex'=>'手机号码格式不正确',
            
            'email.email'=>'邮箱格式不正确',
           
        ];
    }
}
