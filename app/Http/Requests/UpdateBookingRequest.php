<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
           'event_id' => 'sometimes|required|exists:events,id',
           'quantity' => 'sometimes|required|integer|min:1|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'event_id.sometimes' => 'Event is optional',
            'event_id.required' => 'Event is required',
            'event_id.exists' => 'Event does not exist',
            'quantity.sometimes' => 'Quantity is optional',
            'quantity.required' => 'Quantity is required',
            'quantity.integer' => 'Quantity must be an integer',
            'quantity.min' => 'Quantity must be at least 1',
            'quantity.max' => 'Quantity must be at most 100',
        ];
    }
}
