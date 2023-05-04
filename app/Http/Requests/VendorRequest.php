<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'logo' => 'required_without:id|mimes:jpg,jpeg,png',
            'name' => 'required | string | max:100' ,
            'email' => 'required | email | unique:vendors,email, ' .$this -> id,
            'phone' => 'required | max:100 | unique:vendors,phone, ' .$this -> id,
            'category_id' => 'required' ,
            'address' => 'required | string | max:500' ,
            'password' => 'required_without:id' ,
        ];
    }



    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب ' ,
            'logo' => 'هذا الحقل مطلوب ' ,
            'string' => '  لابد أن يكون أحرف' ,
            'max' => '  يجب ألا يزيد عن 100 حرف' ,
            'category_id' => 'القسم غير موجود',
            'email.email' => 'صيغة الايميل غير صحيحة',
            'logo.required_without' => 'الصورة مطلوبة' ,
            'email.unique' => 'البريد الالكتروني مستخدم من قبل' ,
            'phone.unique' => 'الهاتف  مستخدم من قبل' ,

        ];
    }
}
