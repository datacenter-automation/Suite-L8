<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLogStoreRequest extends FormRequest
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
            'user_id'             => ['required', 'integer', 'exists:users,id'],
            'blame_on_user_id'    => ['integer'],
            'ip_address'          => ['string', 'max:255'],
            'session_id'          => ['string', 'max:255'],
            'user_agent'          => ['string'],
            'killed_from_console' => ['required'],
            'logged_out_at'       => [''],
        ];
    }
}
