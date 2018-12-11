<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HuatiRequest extends FormRequest
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
            'cate' => 'required',
            'descript' => 'required'
        ];
    }
     public function messages()
    {
        return [
            'cate.required' => '标题不能为空',
            'descript.required' => '内容不能为空'
            
        ];
    }
}
