<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NepaliDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the input matches the "YYYY-MM-DD" format
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $value)) {
            $fail('The selected date is not valid.');
        }
    }
}
