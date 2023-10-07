<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Foundation\Http\FormRequest;

class CreateFamilyInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'grandfather_name_nepali' => 'required|string|max:255|min:3',
            'grandfather_name_english' => 'required|string|max:255|min:3',
            'father_name_nepali' => 'required|string|max:255|min:3',
            'father_name_english' => 'required|string|max:255|min:3',
            'mother_name_nepali' => 'required|string|max:255|min:3',
            'mother_name_english' => 'required|string|max:255|min:3',
            'spouse' => 'sometimes',
            'citizenship_number' => 'required_if:spouse,string',
        ];
    }
}
