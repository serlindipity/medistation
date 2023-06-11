<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    // Reset
    'reset' => 'Your password has been reset!',
    // Success message displayed when a user's password has been successfully reset.

    // Sent
    'sent' => 'We have emailed your password reset link!',
    // Success message shown when a password reset link has been successfully sent to the user's email address.

    // Throttled
    'throttled' => 'Please wait before retrying.',
    // Instructs the user to wait for a specific duration before attempting to reset the password again.

    // Wrong Token
    'token' => 'This password reset token is invalid.',
    // Error message shown when the provided password reset token is invalid or expired.

    // Wrong Email
    'user' => "We can't find a user with that email address.",
    // Error message displayed when attempting to reset the password for an email address that does not exist in the system.
    // Indicates that the provided email address does not belong to a registered user.
];
