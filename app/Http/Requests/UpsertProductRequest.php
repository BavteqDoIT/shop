<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:500',
            'description' => 'required|max:1500',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0|max:999999.99',
            'image' => 'nullable|image|mimes:png,jpg',
            'category_id' => 'nullable|integer|min:0',
        ];
    }
}
