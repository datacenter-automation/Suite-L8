<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageStoreRequest extends FormRequest
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
            'type'         => ['required', 'string'],
            'from_user_id' => ['integer', 'exists:from_users,id'],
            'to_user_id'   => ['integer', 'exists:to_users,id'],
            'body'         => ['required', 'string'],
            'attachment'   => ['string'],
            'seen'         => ['required'],
        ];
    }
}
