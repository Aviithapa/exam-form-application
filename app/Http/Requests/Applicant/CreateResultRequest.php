<?php

namespace App\Http\Requests\Applicant;

use App\Rules\NepaliDate;
use Illuminate\Foundation\Http\FormRequest;

class CreateResultRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //

            'date_of_birth' => ['required', 'string', new NepaliDate],
            'symbol_number' => ['required', 'string']
        ];
    }
}
