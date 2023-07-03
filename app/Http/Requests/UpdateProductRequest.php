<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'slug' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            // 'image' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng điền đầy đủ thông tin!',
            'slug.required' => 'Vui lòng điền đầy đủ thông tin!',
            'price.required' => 'Vui lòng điền đầy đủ thông tin!',
            'description.required' => 'Vui lòng điền đầy đủ thông tin!',
            'quantity.required' => 'Vui lòng điền đầy đủ thông tin!',
            'status.required' => 'Vui lòng điền đầy đủ thông tin!',
            'category_id.required' => 'Vui lòng điền đầy đủ thông tin!',
            // 'image.required' => 'Vui lòng điền đầy đủ thông tin!',
        ];
    }
}
