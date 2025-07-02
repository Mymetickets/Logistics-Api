<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\StatusEnum; // Importing Enum
use Illuminate\Validation\Rule;

class StoreCountryRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:countries,name'],
            'status' => ['required', 'string', Rule::in(array_column(StatusEnum::cases(), 'value'))],        
        ];
    }
}
