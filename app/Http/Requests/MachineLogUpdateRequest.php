<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineLogUpdateRequest extends FormRequest
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
            'machine_id' => ['required', 'integer', 'exists:machines,id'],
            'user_id'    => ['required', 'integer', 'exists:users,id'],
            'content'    => ['required', 'string'],
        ];
    }
}
