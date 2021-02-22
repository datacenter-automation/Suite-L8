<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketCommentAttachmentStoreRequest extends FormRequest
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
            'ticket_comment_id' => ['required', 'integer', 'exists:ticket_comments,id'],
            'file_name'         => ['required', 'string', 'max:70', 'unique:ticket_comment_attachments,file_name'],
        ];
    }
}
