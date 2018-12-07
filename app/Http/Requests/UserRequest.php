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
            'name' => 'required|regex:/^\S{4,16}$/',
            'password' => 'required|regex:/^\S{5,12}$/',
            'repass'=>'same:password',
            'tel'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email',
            'img'=>'required'
        ];
    }

     public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'name.regex'=>'用户名格式不正确',
            'password.required'  => '密码不能为空',
            'password.regex'  => '密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'tel.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
            'img.required'=>'请上传头像'
        ];
    }
}
