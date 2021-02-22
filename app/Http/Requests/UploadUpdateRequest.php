<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadUpdateRequest extends FormRequest
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
            'filename_uniqid'     => ['required', 'unique:uploads,filename_uniqid'],
            'user_id'             => ['required', 'integer', 'exists:users,id'],
            'filename'            => ['required', 'string'],
            'file_attibutes'      => ['required', 'json'],
            'encrypted_at'        => [''],
            'uploader_ip_address' => ['required'],
        ];
    }
}
