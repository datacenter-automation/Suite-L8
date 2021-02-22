<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketLogUpdateRequest extends FormRequest
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
            'ticket_id' => ['required', 'integer', 'exists:tickets,id'],
            'user_id'   => ['required', 'integer', 'exists:users,id'],
            'content'   => ['required', 'string'],
        ];
    }
}
