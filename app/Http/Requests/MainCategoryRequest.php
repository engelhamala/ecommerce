<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'category' => '  array | min:1',
            // 'category.$index.name' => 'required',
            // 'category.$index.abbr' => 'required',
            // 'category.$index.active' => 'required',
            // 'name' => 'required',
            // 'abbr' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب ' ,
            'photo' => 'هذا الحقل مطلوب ' ,
        ];
    }
}
