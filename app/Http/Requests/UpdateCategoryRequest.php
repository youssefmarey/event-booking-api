<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|max:255',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter category title',
            'title.string' => 'Category title must be a string',
            'title.max' => 'Category title must be less than 255 characters',
            'is_active.boolean' => 'Category status must be a boolean',
        ];
    }
}
