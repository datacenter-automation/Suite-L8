<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineUpdateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'machine_type_id'     => ['required', 'integer', 'exists:machine_types,id'],
            'machine_location_id' => ['integer', 'exists:machine_locations,id'],
            'user_id'             => ['integer', 'exists:users,id'],
            'name'                => ['required', 'string', 'max:255'],
        ];
    }
}
