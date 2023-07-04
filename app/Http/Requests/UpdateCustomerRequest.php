<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'name' => 'required', // Thêm quy tắc kiểm tra unique vào trường 'name' của bảng 'players'
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return  [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'phone.unique' => 'Sản phẩm đã tồn tại.',
            'address.required' => 'Vui lòng điền đầy đủ thông tin!',
            'email.required' => 'Vui lòng điền đầy đủ thông tin!',
            'image.required' => 'Vui lòng điền đầy đủ thông tin!',
        ];
    }
}
