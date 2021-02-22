<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoggerStoreRequest extends FormRequest
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
            'method'            => ['required', 'string'],
            'controller'        => ['required', 'string'],
            'action'            => ['required', 'string'],
            'parameter'         => ['required', 'json'],
            'headers'           => ['required', 'json'],
            'origin_ip_address' => ['required', 'string'],
            'user_id'           => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
