<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateUser extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Bạn không được để trống !',
            'email.required' => 'Bạn không được để trống !',
            'password.required' => 'Bạn không được để trống !',
            'address.required' => 'Bạn không được để trống !',
            'phone.required' => 'Bạn không được để trống !',
            'image.required' => 'Bạn không được để trống !',
            'gender.required' => 'Bạn không được để trống !',
            'birthday.required' => 'Bạn không được để trống !',
        ];
    }
    // Xu ly voi api
    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([
    //         'success'   => false,
    //         'message'   => 'Validation errors',
    //         'data'      => $validator->errors()
    //     ]));
    // }
}
