<?php

namespace App\Http\Requests\Locations\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('states')->ignore($this->route('state')),
            ],
            'country_id' => [
                'nullable',
                'integer',
                'exists:countries,id',
            ],
            'status' => [
                'nullable',
                'string',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

}