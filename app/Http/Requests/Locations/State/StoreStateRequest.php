<?php
namespace App\Http\Requests\Locations\State;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'country_id' => [
                'required',
                'integer',
                'exists:countries,id',
            ],
            'status' => [
                'required',
                'string',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

}