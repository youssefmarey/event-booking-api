<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'description' => 'sometimes|required|string',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date',
            'category_id' => 'sometimes|required|exists:categories,id',
            'price' => 'sometimes|required|decimal',
            'is_active' => 'sometimes|required|boolean',
            'available_seats' => 'sometimes|required|integer',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif|max:204800',
            'location' => 'sometimes|required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.sometimes' => 'Event title is optional',
            'description.sometimes' => 'Event description is optional',
            'start_time.sometimes' => 'Event start time is optional',
            'end_time.sometimes' => 'Event end time is optional',
            'category_id.sometimes' => 'Event category is optional',
            'price.sometimes' => 'Event price is optional',
            'is_active.sometimes' => 'Event status is optional',
            'available_seats.sometimes' => 'Event available seats is optional',
            'image.sometimes' => 'Event image is optional',
            'location.sometimes' => 'Event location is optional',
        ];
    }
}
