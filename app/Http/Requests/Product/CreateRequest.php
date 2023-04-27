<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:60',
            'short_text' => 'required|max:120',
            'text' => 'required',
            'image_path' => 'nullable|mimes:jpg,png,jpeg|max:5000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric',
            'collection_id' => 'required|exists:collections,id'
        ];
    }
}
