<?php

namespace App\Http\Requests\Transportations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransportModeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255|unique:transport_modes,name,' . $this->route('id'),
            'category_id' => 'sometimes|exists:transportation_mode_categories,id',
            'description' => 'sometimes|string|nullable',
            'status' => 'sometimes|boolean',
        ];
    }

}