<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigureRequest extends FormRequest
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
            'content' => 'required',
            'keywords'=>'required',
            'banquan'=>'required'
        ];
    }
     public function messages()
    {
        return [
            'name.required' => '标题不能为空',
            'content.required' => '网站描述不能为空',
            'keywords.required' => '关键字不能为空',
            'banquan.required' => '版权不能为空'
            
        ];
    }
}
