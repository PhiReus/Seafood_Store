<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroreProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'slug' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'image' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'slug.unique' => 'Sản phẩm đã tồn tại.',
            'price.required' => 'Vui lòng điền đầy đủ thông tin!',
            'description.required' => 'Vui lòng điền đầy đủ thông tin!',
            'quantity.required' => 'Vui lòng điền đầy đủ thông tin!',
            'status.required' => 'Vui lòng điền đầy đủ thông tin!',
            'category_id.required' => 'Vui lòng điền đầy đủ thông tin!',
            'image.required' => 'Vui lòng điền đầy đủ thông tin!',
        ];
    }
}
