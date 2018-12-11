<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateupdateRequest extends FormRequest
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
            'cate' => 'required'
            
           
            
        ];
    }

     public function messages()
    {
        return [
            'cate.required' => '话题主题不能为空'
            
        ];
    }
}
