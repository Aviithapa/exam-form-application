<?php

namespace App\Http\Requests\Applicant;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class ChangeStatusApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|in:' . implode(',', StatusEnum::values()),
            'reason' => 'required_if:status,' . StatusEnum::REJECTED . '|string',
        ];
    }
}
