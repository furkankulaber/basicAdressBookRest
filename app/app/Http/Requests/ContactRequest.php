<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'nullable',
            'firstName' => 'required',
            'lastName' => 'required',
            'company' => 'nullable',
            'photo' => 'nullable',
            'detail' => [
                'phoneNumber' => 'required',
                'emailAddress' => 'required',
                'location' => 'required'
            ]
        ];
    }
}
