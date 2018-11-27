<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendRequest extends FormRequest
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
            'name' => 'required',
            
            'url'=>'required|url'
            
        ];
    }

     public function messages()
    {
        return [
            'name.required' => '用户名不能为空',
            'url.required' => '网址不能为空',
            'url.url'=>'网址格式不正确'
            
        ];
    }
}
