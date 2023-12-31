<?php

namespace App\Http\Requests\Applicant;

use App\Rules\NepaliDate;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInformationRequest extends FormRequest
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
            'dob_nepali' => ['required', 'string', new NepaliDate],
            'citizenship_number' => 'required|string|max:255',
            'email' =>  'required|string|max:255',
            'issued_district' => 'required|string',
            'phone_number' => 'required|string|min:7|max:11',
            'province_id' => 'required|exists:province,id',
            'district_id' => 'required|exists:district,id',
            // 'municipality_id' => 'required|exists:municipality,id',
            'ward_no' => 'required|string',
            'profile' => 'required|string',
            'citizenship_front' => 'required|string',
            'citizenship_back' => 'required|string',
            'signature' => 'required|string',
            'working' => 'required|string',

        ];
    }
}
