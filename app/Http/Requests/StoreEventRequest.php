<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|decimal:2',
            'is_active' => 'required|boolean',
            'available_seats' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:204800',
            'location' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter the event title',
            'description.required' => 'Please enter the event description',
            'start_time.required' => 'Please enter the event start time',
            'end_time.required' => 'Please enter the event end time',
            'category_id.required' => 'Please enter the event category',
            'price.required' => 'Please enter the event price',
            'is_active.required' => 'Please enter the event status',
            'available_seats.required' => 'Please enter the available seats',
            'image.required' => 'Please upload an event image',
            'location.required' => 'Please enter the event location',
        ];
    }
}
