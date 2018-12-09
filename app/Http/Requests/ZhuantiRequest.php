<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZhuantiRequest extends FormRequest
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
            'title' => 'required',
            'img' => 'required',
            'content' => 'required'
        ];
    }
     public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'img.required' => '请上传封面图片',
            'content.required' => '内容不能为空'
            
        ];
    }
}
