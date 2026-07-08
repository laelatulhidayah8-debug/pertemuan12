<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class KodeBukuFormat implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^BK-[A-Z]{2,4}-\d{3}$/', $value)) {
            $fail('Format kode buku harus: BK-XXX-000 (contoh: BK-PROG-001)');
        }
    }
}