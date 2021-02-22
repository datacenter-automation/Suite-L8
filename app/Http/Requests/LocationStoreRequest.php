<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
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
            'location_group_id' => ['integer', 'exists:location_groups,id'],
            'name'              => ['required', 'string', 'max:255', 'unique:locations,name'],
            'description'       => ['string', 'max:255'],
        ];
    }
}
