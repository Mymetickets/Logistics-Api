<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\StatusEnum; // Importing Enum
use Illuminate\Validation\Rule;

class StoreLocationRequest extends FormRequest
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
            'city' => ['required', 'string', 'max:255', 'unique:locations,city'], // 'city' as per migration
            'status' => ['required', 'string', Rule::in(array_column(StatusEnum::cases(), 'value'))],
            'country_id' => ['required', 'integer', 'exists:countries,id'], // Ensure country exists
            'state_id' => ['required', 'integer', 'exists:states,id'],     // Ensure state exists
        ];
    }
}
