<?php

namespace App\Http\Requests\Transportations;

use Illuminate\Foundation\Http\FormRequest;

class TransportModeStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:transport_modes,name', // Name is required and must be unique
            'category_id' => 'required|exists:transportation_mode_categories,id', // Must exist in categories table
            'description' => 'nullable|string',
            'status' => 'boolean',
        ];
    }

}