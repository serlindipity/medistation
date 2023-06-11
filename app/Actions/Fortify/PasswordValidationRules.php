<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    // Define the validation rules for passwords
    protected function passwordRules()
    {
        return ['required', 'string', Password::min(8)->numbers()->uncompromised(), 'confirmed'];
        // Password is required
        // Password must have a minimum length of 8 characters
        // Password must contain at least one numeric character
        // Password must not be compromised (using HaveIBeenPwned API)
        // Password must be confirmed (matching password confirmation field)
    }
}
