<?php

namespace App\Rules;

use App\Support\SriLankaMobile;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SriLankaMobileNumber implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_string($value) || !SriLankaMobile::normalize($value)) {
            $fail('Enter a valid Sri Lankan mobile number, such as 0771234567 or +94771234567.');
        }
    }
}
