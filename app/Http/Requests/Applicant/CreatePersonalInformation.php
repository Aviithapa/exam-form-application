<?php

namespace App\Http\Requests\Applicant;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonalInformation extends FormRequest
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
            'full_name_nepali' => 'required|string|max:255|min:3',
            'full_name_english' => 'required|string|max:255|min:3',
            'dob_nepali' => 'required|date|date_format:Y-m-d',
            'dob_english' => 'required|date|date_format:Y-m-d',
            'citizenship_number' => 'required|string|max:255|unique:applicant,citizenship_number',
            'email' =>  'required|string|max:255|unique:applicant,email',
            'issued_district' => 'required|string',
            'phone_number' => 'required|string|min:7|max:11',
            'province_id' => 'required|exists:province,id',
            'district_id' => 'required|exists:district,id',
            'municipality_id' => 'required|exists:municipality,id',
            'ward_no' => 'required|string',
            'profile' => 'required|string',
            'citizenship_front' => 'required|string',
            'citizenship_back' => 'required|string',
            'signature' => 'required|string',
            'right_fingure' => 'required|string',
            'left_fingure' => 'required|string',
            'gender' => 'required|string',


        ];
    }
}
