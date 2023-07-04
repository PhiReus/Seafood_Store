<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:customers',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required|min:5|',
            'confirmpassword' => 'required|min:5|',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return  [
            'name.required' => 'Bạn không được để trống !',
            'email.required' => 'Bạn không được để trống !',
            'address.required' => 'Bạn không được để trống !',
            'phone.required' => 'Bạn không được để trống !',
            'image.required' => 'Bạn không được để trống !',
            'password.required' => 'Vui lòng không được để trống',
            'password.min'      => 'Vui lòng nhập trên :min kí tự',
            'confirmpassword.required' => 'Vui lòng không được để trống',
            'confirmpassword.min'      => 'Vui lòng nhập trên :min kí tự',

        ];
    }
}
