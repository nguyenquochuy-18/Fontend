<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestShoppingCart extends FormRequest
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
            'email'=>'required|email',
            'address' => 'required',
            'phone' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'address.required' => 'Vui lòng nhập địa chỉ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'phone.required' => 'Vui lòng nhập số điện thoại'
        ];
    }
}
