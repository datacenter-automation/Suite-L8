<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineNoteAttachmentUpdateRequest extends FormRequest
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
            'machine_note_id' => ['required', 'integer', 'exists:machine_notes,id'],
            'file_name'       => ['required', 'string', 'max:70', 'unique:machine_note_attachments,file_name'],
        ];
    }
}
