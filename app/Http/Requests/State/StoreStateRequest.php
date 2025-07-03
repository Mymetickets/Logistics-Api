<?php

namespace App\Http\Requests\State;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\StatusEnum; // Importing Enum
use Illuminate\Validation\Rule;

class StoreStateRequest extends FormRequest
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
            // Adding validation for state-name, state status and country_id parenting the state
            'name' => ['required', 'string', 'max:255', 'unique:states,name'],
            'status' => ['required', 'string', Rule::in(array_column(StatusEnum::cases(), 'value'))],        
            'country_id' => ['required', 'integer', 'exists:countries,id'], // <-- ADD THIS LINE
 
        ];
    }
}
