<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;
use Illuminate\Translation\PotentiallyTranslatedString;

class EmployeeId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param \Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Str::contains($value, '-')) {
            $fail('The :attribute must be in XY-1234 format.');
        }

        $parts = explode('-', $value);
        $preId = $parts[0];
        $postId = $parts[1];

        if (Str::length($preId) !== 2 || !Str::length($preId) > 0) {
            $fail('The :attribute must be in XY-1234 format.');
        }
    }
}
